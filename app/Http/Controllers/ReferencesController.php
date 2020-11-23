<?php

namespace App\Http\Controllers;

use App\Models\References;
use Illuminate\Http\Request;

class ReferencesController extends Controller
{
    public function index(){
        $references = References::all();

        return response()->json($references,200);
    }

    public function show($id){
        $references = References::find($id);

        return response()->json($references,200);
    }

    public function save(Request $request){
        $references = References::create($request->all());
        return response()->json($references,201);
    }

    public function delete($id){
        $references = References::find($id);
        $references->delete();

        return response()->json(null, 204);
    }
}
