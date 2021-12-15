<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Torann\GeoIP\Facades\GeoIP;

class OlahragaController extends Controller
{
    public function index(Request $request){
        $search_key = $request->query('search');
        $sortby_key = $request->query('sortby');

        $data['object_type'] = 'sarana olahraga';
        $currentLocation = GeoIP::getLocation('111.94.186.184');
        $data['myLatitude'] = $currentLocation['lat'];
        $data['myLongitude'] = $currentLocation['lon'];
        // $ip = $_SERVER['REMOTE_ADDR'];
        // $currentLocation = GeoIP::getLocation($ip);

        if($search_key && $sortby_key){
            if($sortby_key == 'rating'){
                $data['data'] = DB::table('object')
                ->where('jenis', 'Sarana Olahraga')
                ->where('nama', 'ilike', '%'.$search_key.'%')
                ->orderBy('rating', 'desc')
                ->take(6)
                ->get();
            } else{
                $data['data'] = DB::table('object')
                ->where('jenis', 'Sarana Olahraga')
                ->where(function($query) use ($search_key){
                    $query->where('nama', 'ilike', '%'.$search_key.'%')
                    ->orWhere('alamat', 'ilike', '%'.$search_key.'%');
                })
                ->orderBy('rating', 'desc') // Nanti diganti order by jarak
                ->take(6)
                ->get();
            }
        } else if($search_key){
            $data['data'] = DB::table('object')
            ->where('jenis', 'Sarana Olahraga')
            ->where(function($query) use ($search_key){
                $query->where('nama', 'ilike', '%'.$search_key.'%')
                ->orWhere('alamat', 'ilike', '%'.$search_key.'%');
            })
            ->orderBy('rating', 'desc') // Nanti diganti order by jarak
            ->take(6)
            ->get();

        } else if($sortby_key){
            if($sortby_key == 'rating'){
                $data['data'] = DB::table('object')
                ->where('jenis', 'Sarana Olahraga')
                ->orderBy('rating', 'desc')
                ->take(6)
                ->get();
            } else{
                $data['data'] = DB::table('object')
                ->where('jenis', 'Sarana Olahraga')
                ->orderBy('rating', 'desc') // Nanti diganti order by jarak
                ->take(6)
                ->get();
            }
        } else{
            $data['data'] = DB::table('object')
            ->where('jenis', 'Sarana Olahraga')
            ->orderBy('rating', 'desc') // Nanti diganti order by jarak
            ->take(6)
            ->get();
        }
        return view("pages.search", $data);
    }

    public function detail($id){
        $data['object_type'] = 'sarana olahraga';
        $currentLocation = GeoIP::getLocation('111.94.186.184');
        $data['myLatitude'] = $currentLocation['lat'];
        $data['myLongitude'] = $currentLocation['lon'];

        $data['data'] = DB::table('object')
        ->where('jenis', 'Sarana Olahraga')
        ->where('id', $id)
        ->first();

        $data['recommend'] = DB::table('object')
        ->where('jenis', 'Sarana Olahraga')
        ->orderBy('rating', 'desc')
        ->take(6)
        ->get();
        
        return view("pages.detail", $data);
    }
}
