<?php

namespace App\Http\Controllers;

use Session;
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
        $public = Artikel::orderBy('created_at')->where('status', 1)->orWhere('statusprivate', 0);
        $artikels = Artikel::orderBy('created_at','DESC')->where('status', 1)->paginate(6);
        $kategoris = Kategori::all();
        $blogs = Artikel::orderBy('created_at', 'desc')->take(4)->get();
        return view('blog', compact('artikels', 'kategoris', 'blogs', 'public'));
    }

    public function artikelkategori(Kategori $kategori)
    {
        $artikels = $kategori->Artikel()->latest()->paginate(6);
        $blogs = Artikel::orderBy('created_at', 'desc')->take(4)->get();
        $kategoris = Kategori::all();
        return view('kategori', compact('artikels', 'blogs', 'kategoris', 'kategori'));
    }

    public function detail(Artikel $artikels)
    {
        $blogs = Artikel::orderBy('created_at', 'desc')->take(4)->get();
        $kategoris = Kategori::all();
        $view = 'blog_' . $artikels->id;
        if (!Session::has($view)) {
            $artikels->increment('visit_count');
            Session::put($view,1);
        }
        // $previous = Artikel::where('id', '<', $artikels->slug)->orderBy('id', 'desc')->first();
        // $next = Artikel::where('id', '>', $artikels->slug)->orderBy('id')->first();
    
        return view('singleblog', compact('artikels', 'blogs', 'kategoris'));
    }

    public function cari(Request $request)
    {
        // Mengambil Data Pencarian
        $cari = $request->cari;
        
        $artikels = Artikel::where('judul', 'like', "%".$cari."%")->paginate(6);
        $blogs = Artikel::orderBy('created_at', 'desc')->take(4)->get();
        $kategoris = Kategori::all();
        
        return view('blog', compact('blogs', 'kategoris','artikels'));
    }
}
