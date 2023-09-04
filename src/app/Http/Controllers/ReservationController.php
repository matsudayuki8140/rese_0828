<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Request $request) {
        $userId = Auth::id();
        $rese = $request->only(['shop_id', 'date', 'time', 'number']);
        Reservation::create([
            'user_id' => $userId,
            'shop_id' => $rese['shop_id'],
            'date' => $rese['date'],
            'time' => $rese['time'],
            'number' => $rese['number'],
        ]);

        return  view('done');
    }
}
