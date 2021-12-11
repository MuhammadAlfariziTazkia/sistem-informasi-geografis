<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OlahragaController extends Controller
{
    public function index(Request $request){
        $search_key = $request->query('search');
        $sortby_key = $request->query('sortby');


        // if ($search_key && $sortby_key){
        //     // $wisata = DB::select(DB::raw("SELECT * FROM object WHERE nama ILIKE '%".$search_key."%' OR alamat ILIKE '%".$search_key."%' ORDER BY ".$sortby_key." DESC"));
        // } else if($search_key && !$sortby_key){
        //     // STATEMENT
        //     $olahraga = DB::table('object as o')
        //     ->where('o.jenis', 'Sarana Olahraga')
        //     ->join('asset as a', 'a.object_id', '=', 'o.id')
        //     ->select([
        //         'o.id as id',
        //         'o.nama as nama',
        //         'o.jenis as jenis',
        //         'o.alamat as alamat',
        //         'o.no_telp as no_telp',
        //         'o.rating as rating',
        //         'o.source as source',
        //         'o.latitude as latitude',
        //         'o.longitude as longitude',
        //         'o.geometry as geometry',
        //         'a.link as asset_link',
        //         'a.source as asset_source'
        //     ])->get();
        //     var_dump($olahraga);die;
        //     // $wisata = DB::select(DB::raw("SELECT * FROM object WHERE nama ILIKE '%".$search_key."%' OR alamat ILIKE '%".$search_key."%'"));
        // } else if(!$search_key && $sortby_key){
        //     // $wisata = ObjectModel::select('*')->orderBy($sortby_key, 'desc')->get();
        // } else if(!$search_key && !$sortby_key) {
        //     // $wisata = ObjectModel::all();
        // } else{

        // }
    }

    public function detail($id){
        $data['detail'] = DB::table('object as o')
        ->where('o.jenis', 'Sarana Olahraga')
        ->where('o.id', $id)
        ->join('asset as a', 'a.object_id', '=', 'o.id')
        ->select([
            'o.id as id',
            'o.nama as nama',
            'o.jenis as jenis',
            'o.alamat as alamat',
            'o.no_telp as no_telp',
            'o.rating as rating',
            'o.source as source',
            'o.latitude as latitude',
            'o.longitude as longitude',
            'o.geometry as geometry',
            'a.link as asset_link',
            'a.source as asset_source'
        ])->first();
        
        $data['recommend'] = DB::table('object as o')
        ->where('o.jenis', 'Sarana Olahraga')
        ->join('asset as a', 'a.object_id', '=', 'o.id')
        ->select([
            'o.id as id',
            'o.nama as nama',
            'o.jenis as jenis',
            'o.alamat as alamat',
            'o.no_telp as no_telp',
            'o.rating as rating',
            'o.source as source',
            'o.latitude as latitude',
            'o.longitude as longitude',
            'o.geometry as geometry',
            'a.link as asset_link',
            'a.source as asset_source'
        ])
        ->orderBy('rating', 'desc')
        ->take(6)
        ->get();
        return $data;
    }
}
