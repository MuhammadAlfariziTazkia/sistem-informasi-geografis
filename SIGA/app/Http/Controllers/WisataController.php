<?php

namespace App\Http\Controllers;

use App\Models\ObjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Torann\GeoIP\Facades\GeoIP;

class WisataController extends Controller
{
    //
    public function index(Request $request){
        $currentLocation = GeoIP::getLocation();
        $search_key = $request->query('search');
        $sortby_key = $request->query('sortby');

        // KALAU ADA SEARCH KEY QUERY DAN ADA SORTBY QUERY
        if ($search_key && $sortby_key){
            // STATEMENT
            $wisata = DB::select(DB::raw("SELECT * FROM object WHERE nama ILIKE '%".$search_key."%' OR alamat ILIKE '%".$search_key."%' ORDER BY ".$sortby_key." DESC"));
        } 
        // KALAU ADA SEARCH KEY TAPI TIDAK ADA SORTBY KEY
        else if($search_key && !$sortby_key){
            // STATEMENT
            $wisata = DB::select(DB::raw("SELECT * FROM object WHERE nama ILIKE '%".$search_key."%' OR alamat ILIKE '%".$search_key."%'"));
        }
        // KALAU TIDAK ADA SEARCH KEY TAPI ADA SORTBY KEY
        else if(!$search_key && $sortby_key){
            // STATEMENT
            $wisata = ObjectModel::select('*')->orderBy($sortby_key, 'desc')->get();
        }
        // KALAU TIDAK ADA KEDUANYA
        else if(!$search_key && !$sortby_key) {
            // STATEMENT
            $wisata = ObjectModel::all();
        }
        // SELAIN ITU ARAHKAN KE HALAMAN ERROR NOT FOUND 
        else{
            // STATEMENT
        }
        return $wisata;
    }

    public function detail($id){
        $wisata = ObjectModel::find($id);
        $assets = DB::select(DB::raw("SELECT * FROM asset WHERE object_id = '".$id."'"));
        $rekomendasi = DB::select(DB::raw("SELECT * FROM object ORDER BY rating DESC"));
        return compact('wisata', 'assets', 'rekomendasi');
    }
}
