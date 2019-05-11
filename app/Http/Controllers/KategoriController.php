<?php

namespace App\Http\Controllers;

use Session;
use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.index',compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'nama' => 'required|unique:kategoris',
            'slug' => '',
        ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan <b>$request->nama</b>"
        ]);

        $kategoris = new Kategori;
        $kategoris->nama = $request->nama;
        $kategoris->slug = str_slug($request->nama,'-');
        $kategoris->save();
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoris = Kategori::findOrFail($id);
        return view('kategori.edit',compact('kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|max:255',
            'slug' => '',
        ]);

        $kategoris = Kategori::findOrFail($id);
        
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil mengubah <b>$kategoris->nama</b> menjadi <b>$request->nama</b>"
        ]);
        
        $kategoris->nama = $request->nama;
        $kategoris->slug = str_slug($request->nama,'-');
        $kategoris->save();
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategoris = Kategori::findOrFail($id);
        if(!Kategori::destroy($id)) return redirect()->back();

        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Kategori berhasil dihapus"
        ]);
        
        $kategoris->delete();
        return redirect()->route('kategori.index');
    }
}
