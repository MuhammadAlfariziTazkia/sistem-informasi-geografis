<?php

namespace App\Http\Controllers;

use App\Http\Helpers\UserSystemHelper;
use App\Models\ObjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Torann\GeoIP\Facades\GeoIP;

class WisataController extends Controller
{
    //
    public function index(Request $request){
        $object_type = 'wisata';
        $sortby_key = $request['sortby'];
        $search_key = $request['search'];
        
        $ip = $_SERVER['REMOTE_ADDR'];
        // echo $ip;
        // $currentLocation = GeoIP::getLocation($ip);
        $currentLocation = GeoIP::getLocation('111.94.186.184');
        $myLatitude = $currentLocation['lat'];
        $myLongitude = $currentLocation['lon'];

        $search_key = $request->query('search');
        $sortby_key = $request->query('sortby');

        if($search_key == 'yes') {
            $search_key = $request['search'];
        }
        
        if(strlen($sortby_key) == 0){
            $sortby = 'distance';
        }else{
            $sortby = $sortby_key;
        }

        // KALAU ADA SEARCH KEY QUERY DAN ADA SORTBY QUERY
        if ($search_key && $sortby_key){
            // STATEMENT
            $data = DB::select(DB::raw("SELECT *, ST_Distance(ST_MakePoint(".$myLatitude.",". $myLongitude.")::geometry,geometry::geometry,true) as distance FROM object WHERE jenis = 'Pariwisata' AND (nama ILIKE '%".$search_key."%' OR alamat ILIKE '%".$search_key."%') ORDER BY ".$sortby_key." DESC"));
        } 
        // KALAU ADA SEARCH KEY TAPI TIDAK ADA SORTBY KEY
        else if($search_key && !$sortby_key){
            // STATEMENT
            $data = DB::select(DB::raw("SELECT *, ST_Distance(ST_MakePoint(".$myLatitude.",". $myLongitude.")::geometry,geometry::geometry,true) as distance FROM object WHERE jenis = 'Pariwisata' AND (nama ILIKE '%".$search_key."%' OR alamat ILIKE '%".$search_key."%') ORDER BY distance DESC"));
        }
        // KALAU TIDAK ADA SEARCH KEY TAPI ADA SORTBY KEY
        else if(!$search_key && $sortby_key){
            // STATEMENT
            $data = DB::select(DB::raw("SELECT *, ST_Distance(ST_MakePoint(".$myLatitude.",". $myLongitude.")::geometry,geometry::geometry,true) as distance FROM object WHERE jenis = 'Pariwisata' ORDER BY ".$sortby_key." DESC"));
        }
        // KALAU TIDAK ADA KEDUANYA
        else if(!$search_key && !$sortby_key) {
            // STATEMENT
            $data = DB::select(DB::raw("SELECT *, ST_Distance(ST_MakePoint(".$myLatitude.",". $myLongitude.")::geometry,geometry::geometry,true) as distance FROM object WHERE jenis = 'Pariwisata' ORDER BY distance DESC"));
        }
        // SELAIN ITU ARAHKAN KE HALAMAN ERROR NOT FOUND 
        else{
            // STATEMENT
        }
        $others = ObjectModel::all()->where('jenis', 'Pariwisata');
        return view('pages.search',compact('object_type', 'myLatitude', 'myLongitude', 'sortby', 'data', 'search_key', 'others'));
    }

    public function detail($id){
        $object_type = 'wisata';
        $data = ObjectModel::find($id);
        $rekomendasi = DB::select(DB::raw("SELECT * FROM object WHERE jenis = 'Pariwisata' ORDER BY rating DESC LIMIT 6"));
        return view('pages.detail',compact('object_type', 'data', 'rekomendasi')) ;
    }
}
