<?php

namespace App\Http\Controllers;

use App\User;
use App\Artikel;
use App\Kategori;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $users = User::all();
        $artikels = Artikel::orderBy('created_at', 'desc')->take(3)->get();
        return view('index', compact('artikels', 'users'));
    }

    public function blog()
    {
        $artikels = Artikel::orderBy('created_at','DESC')->paginate(6);
        $kategoris = Kategori::all();
        $blogs = Artikel::orderBy('created_at', 'desc')->take(4)->get();
        return view('blog', compact('artikels', 'kategoris', 'blogs'));
    }

    public function detail($slug)
    {
        $artikels = Artikel::where('slug', $slug)->first();
        $blogs = Artikel::orderBy('created_at', 'desc')->take(4)->get();
        // $previous = Artikel::where('id', '<', $artikels->slug)->orderBy('id', 'desc')->first();
        // $next = Artikel::where('id', '>', $artikels->slug)->orderBy('id')->first();
    
        return view('singleblog', compact('artikels', 'blogs'));
    }

    public function artikelkategori(Kategori $kategori)
    {
        $artikels = $kategori->Artikel()->latest()->paginate(6);
        $blogs = Artikel::orderBy('created_at', 'desc')->take(4)->get();
        $kategoris = Kategori::all();
        return view('blog', compact('artikels', 'blogs', 'kategoris'));
    }
}
