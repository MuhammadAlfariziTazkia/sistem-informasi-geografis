<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WisataController extends Controller
{
    //
    public function index(Request $request){
        $search_key = $request->query('search');
        $sortby_key = $request->query('sortby');

        // KALAU ADA SEARCH KEY QUERY DAN ADA SORTBY QUERY
        if ($search_key && $sortby_key){
            // STATEMENT
        } 
        // KALAU ADA SEARCH KEY TAPI TIDAK ADA SORTBY KEY
        else if($search_key && !$sortby_key){
            // STATEMENT
        }
        // KALAU TIDAK ADA SEARCH KEY TAPI ADA SORTBY KEY
        else if(!$search_key && $sortby_key){
            // STATEMENT
        }
        // KALAU TIDAK ADA KEDUANYA
        else if(!$search_key && !$sortby_key) {
            // STATEMENT
        }
        // SELAIN ITU ARAHKAN KE HALAMAN ERROR NOT FOUND 
        else{
            // STATEMENT
        }
    }

    public function detail($slug){
        return $slug;
    }
}
