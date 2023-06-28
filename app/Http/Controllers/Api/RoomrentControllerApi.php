<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roomrent;
use App\Models\Category;

class RoomrentControllerApi extends Controller
{
    public function roomrent_list($category_id = null) {
        if($category_id) {
            $roomrents = Roomrent::where('category_id', $category_id)->get();
            return response()->json(array ( 'ok' => true,'roomrents' => $roomrents,));
        }
        else {
            $roomrents = Roomrent::all();
            return response()->json(array ( 'ok' => true,'roomrents' => $roomrents,));
        }
    }
    // public function roomrent_search(Request $request) {
    //     $query = $request->query;
    //     if($query) {
    //         $roomrents = Roomrent::where('house_number','like', '%'.$query.'%')->get();
    //     }
    //     else {
    //         $roomrents = Roomrent::all();
    //     }
    //     return response()->json(array('ok' => true,'roomrents' => $roomrents));
    // }
}
