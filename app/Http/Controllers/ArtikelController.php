<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Artikel;
use App\Kategori;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikels = Artikel::with('Kategori')->get();
        $kategoris = Kategori::all();
        return view('artikel.index',compact('artikels', 'kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();     
        return view('artikel.create',compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kategori_id' => 'required',
            'user_id' => 'required',
            'judul' => 'required',
            'slug' => '',
            'foto' => 'required',
            'isi' => 'required'
        ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan <b>$request->judul</b>"
        ]);

        $artikels = new Artikel;
        $artikels->judul = $request->judul;
        $artikels->kategori_id = $request->kategori_id;
        $artikels->user_id = $request->user_id;
        $artikels->slug = str_slug($request->judul,'-').'-'.str_random(2);
        $artikels->isi = $request->isi;
        $artikels->foto = $request->foto;
        $artikels->status = 0;
        // if ($request->hasFile('foto')) {
        //     $file = $request->file('foto');
        //     $destinationPath = public_path().'/img/artikel/';
        //     $filename = str_random(6).'_'.$file->getClientOriginalName();
        //     $uploadsucces = $file->move($destinationPath, $filename);
        //     $artikels->foto = $filename;
        // }
        
        $artikels->save();
        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikels = Artikel::findOrFail($id);
        $kategoris = Kategori::all();
        $selectedKategori = Artikel::findOrFail($id)->kategori_id;
        return view('artikel.edit', compact('artikels', 'kategoris', 'selectedKategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'judul' => 'required|max:255',
            'kategori_id' => 'required|',
            'user_id' => 'required',
            'slug' => '',
            'isi' => 'required'
        ]);
        $artikels = Artikel::findOrFail($id);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil mengubah <b>$artikels->judul</b>"
        ]);

        $artikels->judul = $request->judul;
        $artikels->slug = str_slug($request->judul,'-').'-'.str_random(2);
        $artikels->kategori_id = $request->kategori_id;
        $artikels->user_id = $request->user_id;
        $artikels->isi = $request->isi;
        $artikels->foto = $request->foto;
        $artikels->visit_count = $request->visit_count;
        $artikels->comment_count = $request->comment_count;
        if ($artikels->status == 0) {
            $artikels->status = 0;
        } else {
            $artikels->status = 1;
        }
        // if ($request->hasFile('foto')) {
        //     $file = $request->file('foto');
        //     $destinationPath = public_path().'/img/artikel/';
        //     $filename = str_random(6).'_'.$file->getClientOriginalName();
        //     $uploadsucces = $file->move($destinationPath, $filename);
        //     if ($artikels->foto){
        //         $old_img = $artikels->foto;
        //         $filepath = public_path() . DIRECTORY_SEPARATOR . '/img/artikel/'
        //         . DIRECTORY_SEPARATOR . $artikels->foto;
        //         try{
        //             file::delete($filepath);
        //         } catch (FileNotFoundException $e) {

        //         }
        //     }
        //     $artikels->foto = $filename;
        // }
        $artikels->save();
        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikels = Artikel::findOrFail($id);
        $artikels->delete();
        return redirect()->route('artikel.index');
    }

    public function verify($id)
    {
        $artikels = Artikel::findOrFail($id);

        if ($artikels->status === 0) {
            $artikels->status = 1;
        }
        $artikels->save();

        return redirect()->route('artikel.index');
    }
}
