<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    //
    public function index($place_id) {
        $packages = Package::where('place_id', $place_id)->get();
    
        return response()->json($packages);
    }
}