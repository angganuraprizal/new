<?php

namespace App\Http\Controllers;

use Session;
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
        return view('artikel.index',compact('artikels'));
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
            'judul' => 'required',
            'slug' => '',
            'foto' => 'required',
            'isi' => 'required'
        ]);

        $artikels = new Artikel;
        $artikels->judul = $request->judul;
        $artikels->kategori_id = $request->kategori_id;
        $artikels->slug = str_slug($request->judul,'-');
        $artikels->isi = $request->isi;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = public_path().'/img/artikel/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadsucces = $file->move($destinationPath, $filename);
            $artikels->foto = $filename;
        }
        
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
            'slug' => '',
            'isi' => 'required'
        ]);
        $artikels = Artikel::findOrFail($id);
        $artikels->judul = $request->judul;
        $artikels->slug = str_slug($request->judul,'-');
        $artikels->kategori_id = $request->kategori_id;
        $artikels->isi = $request->isi;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = public_path().'/img/artikel/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadsucces = $file->move($destinationPath, $filename);
            if ($artikels->foto){
                $old_img = $artikels->foto;
                $filepath = public_path() . DIRECTORY_SEPARATOR . '/img/artikel/'
                . DIRECTORY_SEPARATOR . $artikels->foto;
                try{
                    file::delete($filepath);
                } catch (FileNotFoundException $e) {

                }
            }
            $artikels->foto = $filename;
        }
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
}
