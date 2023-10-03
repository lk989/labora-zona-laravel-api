<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ReservationController extends Controller
{
    //
    public function index($package_id, $date) {

        $newDate = Carbon::createFromDate($date);
        
        $reservations = Reservation::where('package_id', $package_id)->where('date', $newDate)->get();
    
        return response()->json($reservations);
    }

    public function store(){
        $c = Reservation::create(
            request()->validate([
                'customerId' => 'required',
                'packageId' => 'required',
                'date' => 'required',
                'time' => 'required',
            ])
        );
    }
}
