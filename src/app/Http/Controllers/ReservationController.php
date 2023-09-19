<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(ReservationRequest $request) {
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

    public function update(ReservationRequest $request) {
        $rese = $request->only(['date', 'time', 'number']);
        Reservation::find($request->id)->update($rese);

        return redirect('/mypage')->with('message', '予約情報を変更しました');
    }

    public function destroy(Request $request) {
        Reservation::find($request->id)->delete();
        return redirect('/mypage')->with('message', '予約を削除しました');
    }
}
