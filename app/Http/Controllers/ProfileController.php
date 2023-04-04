<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{
    public function index()
    {
    	// mengambil data dari table
    	$profile = DB::table('profile')->get();
 
    	// mengirim data ke view
    	return view('Vprofile',['profile' => $profile]);
 
    }
}
