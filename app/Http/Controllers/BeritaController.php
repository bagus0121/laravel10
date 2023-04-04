<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BeritaController extends Controller
{
    public function index()
    {
    	// mengambil data dari table
    	$berita = DB::table('berita')->get();
		$jumlah_berita = DB::table('berita')->max('id');

        // menambahkan 1 pada hasil count
        $jumlah_berita += 1;
		$format = str_pad($jumlah_berita, 4, '0', STR_PAD_LEFT);

        // mengirim data ke view
        return view('Vberita',['berita' => $berita, 'format' => $format]);
  
    
    }

	public function tambah(Request $request)
    {
    	DB::table('berita')->insert([
			'id_berita' => $request->kd_berita,
			'nama' => $request->nama_berita,

		]);
		// alihkan halaman ke halaman berita
		return redirect('/berita');
 
    }

	public function hapus(Request $request)
    {
		$id=$request->kd_berita;
		DB::table('berita')->where('id_berita',$id)->delete();

		// alihkan halaman ke halaman berita
		return redirect('/berita');
 
    }

	public function edit(Request $request)
    {
    	DB::table('berita')->where('id',$request->kd_berita)->update([
		
			'nama' => $request->nama_berita,

		]);
		// alihkan halaman ke halaman berita
		return redirect('/berita');
 
    }



}
