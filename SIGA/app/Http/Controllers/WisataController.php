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

        $ip = $_SERVER['REMOTE_ADDR'];
        // $currentLocation = GeoIP::getLocation($ip);
        $currentLocation = GeoIP::getLocation('111.94.186.184');
        $myLatitude = $currentLocation['lat'];
        $myLongitude = $currentLocation['lon'];

        $search_key = $request->query('search');
        $sortby_key = $request->query('sortby');

        // KALAU ADA SEARCH KEY QUERY DAN ADA SORTBY QUERY
        if ($search_key && $sortby_key){
            // STATEMENT
            $data = DB::select(DB::raw("SELECT *, ST_Distance(ST_MakePoint(".$myLatitude.",". $myLongitude.")::geometry,geometry::geometry,true) as distance FROM object WHERE nama ILIKE '%".$search_key."%' OR alamat ILIKE '%".$search_key."%' ORDER BY ".$sortby_key." DESC"));
        } 
        // KALAU ADA SEARCH KEY TAPI TIDAK ADA SORTBY KEY
        else if($search_key && !$sortby_key){
            // STATEMENT
            $data = DB::select(DB::raw("SELECT *, ST_Distance(ST_MakePoint(".$myLatitude.",". $myLongitude.")::geometry,geometry::geometry,true) as distance FROM object WHERE nama ILIKE '%".$search_key."%' OR alamat ILIKE '%".$search_key."%' ORDER BY distance DESC"));
        }
        // KALAU TIDAK ADA SEARCH KEY TAPI ADA SORTBY KEY
        else if(!$search_key && $sortby_key){
            // STATEMENT
            $data = DB::select(DB::raw("SELECT *, ST_Distance(ST_MakePoint(".$myLatitude.",". $myLongitude.")::geometry,geometry::geometry,true) as distance FROM object WHERE ORDER BY ".$sortby_key." DESC"));
        }
        // KALAU TIDAK ADA KEDUANYA
        else if(!$search_key && !$sortby_key) {
            // STATEMENT
            $data = DB::select(DB::raw("SELECT *, ST_Distance(ST_MakePoint(".$myLatitude.",". $myLongitude.")::geometry,geometry::geometry,true) as distance FROM object ORDER BY distance DESC"));
        }
        // SELAIN ITU ARAHKAN KE HALAMAN ERROR NOT FOUND 
        else{
            // STATEMENT
        }

        return compact('object_type', 'myLatitude', 'myLongitude', 'data');
    }

    public function detail($id){
        $data = ObjectModel::find($id);
        $assets = DB::select(DB::raw("SELECT * FROM asset WHERE object_id = '".$id."'"));
        $rekomendasi = DB::select(DB::raw("SELECT * FROM object ORDER BY rating DESC"));
        return compact('wisata', 'assets', 'rekomendasi');
    }
}
