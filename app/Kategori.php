<?php

namespace App;

use Session;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['nama'];
	protected $visible = ['nama'];
	public $timestamp = true;

	public function artikel(){
		return $this->hasMany('App\Artikel','kategori_id');
	}

	public static function boot()
    {
        parent::boot();
        self::deleting(function($artikels) {
            // mengecek apakah Kategori masih punya buku
            if ($artikels->artikel->count() > 0) {
                // menyiapkan pesan error
                $html = 'Kategori tidak bisa dihapus karena masih memiliki artikel : ';
                $html .= '<ul>';
                foreach ($artikels->artikel as $kategori) {
                    $html .= "<li><b>$kategori->judul</b></li>";
                }
                $html .= '</ul>';
                Session::flash("flash_notification", [
                    "level"=>"danger",
                    "message"=>$html
                ]);
                // membatalkan proses penghapusan
                return false;
            }
        });
    }
}
