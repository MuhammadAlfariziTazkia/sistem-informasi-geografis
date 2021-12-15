<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OlahragaController extends Controller
{
    public function index(Request $request){
        $search_key = $request->query('search');
        $sortby_key = $request->query('sortby');

        if($search_key && $sortby_key){
            if($sortby_key == 'rating'){
                $data = DB::table('object as o')
                ->where('o.jenis', 'Sarana Olahraga')
                ->where('o.nama', 'ilike', '%'.$search_key.'%')
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
            } else{
                $data = DB::table('object as o')
                ->where('o.jenis', 'Sarana Olahraga')
                ->where(function($query) use ($search_key){
                    $query->where('o.nama', 'ilike', '%'.$search_key.'%')
                    ->orWhere('o.alamat', 'ilike', '%'.$search_key.'%');
                })
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
                ->orderBy('rating', 'desc') // Nanti diganti order by jarak
                ->take(6)
                ->get();
            }
        } else if($search_key){
            $data = DB::table('object as o')
            ->where('o.jenis', 'Sarana Olahraga')
            ->where(function($query) use ($search_key){
                $query->where('o.nama', 'ilike', '%'.$search_key.'%')
                ->orWhere('o.alamat', 'ilike', '%'.$search_key.'%');
            })
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
            ->orderBy('rating', 'desc') // Nanti diganti order by jarak
            ->take(6)
            ->get();

        } else if($sortby_key){
            if($sortby_key == 'rating'){
                $data = DB::table('object as o')
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
            } else{
                $data = DB::table('object as o')
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
                ->orderBy('rating', 'desc') // Nanti diganti order by jarak
                ->take(6)
                ->get();
            }
        } else{
            $data = DB::table('object as o')
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
            ->orderBy('rating', 'desc') // Nanti diganti order by jarak
            ->take(6)
            ->get();
        }
        return $data;
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
