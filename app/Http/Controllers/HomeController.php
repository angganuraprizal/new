<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Artikel;
use App\Kategori;
use Illuminate\Http\Request;
use Laratrust\LaratrustFacade as Laratrust;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Laratrust::hasRole('admin')) return $this->adminDashboard();
        if (Laratrust::hasRole('member')) return $this->memberDashboard();

        return view('home');
    }

    protected function adminDashboard()
    {
        $kategoris = Kategori::all();
        $artikels = Artikel::all();

        return view('home', compact('kategoris', 'artikels'));
    }

    protected function memberDashboard()
    {
        $users = User::all();
        $artikels = Artikel::orderBy('created_at', 'desc')->take(3)->get();
        return view('index', compact('artikels', 'users'));
    }
}
