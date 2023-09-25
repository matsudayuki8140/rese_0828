<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShopStoreRequest;
use App\Http\Requests\ShopUpdateRequest;
use App\Http\Requests\MailRequest;
use App\Models\User;
use App\Models\Shop;
use App\Models\Representative;
use App\Models\Reservation;
use App\Models\Rating;
use App\Mail\ShopMail;
use Carbon\Carbon;

class RepresentativeController extends Controller
{
    public function index() {
        $user = Auth::user();

        if($user->isHadShop($user['id'])) {
            $representative = Representative::where('user_id', $user['id'])
            ->with('shop')
            ->first();
            $reseCount = Reservation::where('shop_id', $representative->shop_id)
            ->where('date', date("Y-m-d"))
            ->count();
        } else {
            // kari
            $representative = null;
            $reseCount = 0;
        }

        return view('shop.index', compact('user', 'representative', 'reseCount'));
    }

    public function rese(Request $request) {
        $num = (int)$request->num;
        $dt = new Carbon();
        if ($num == 0) {
            $date = $dt;
        } elseif ($num > 0) {
            $date = $dt->addDays($num);
        } else {
            $date = $dt->subDays(-$num);
        }
        $fixed_date = $date->toDateString();

        $representative = Representative::where('user_id', Auth::id())
        ->first();
        $reservations = Reservation::where('shop_id', $representative->shop_id)
        ->where('date', $fixed_date)
        ->get();
        return view('shop.rese', compact('reservations', 'num', 'fixed_date'));
    }

    public function rating(Request $request) {
        $representative = Representative::where('user_id', Auth::id())->first();
        $ratings = Rating::where('shop_id', $representative->shop_id)->get();
        return view('shop.rating', compact('ratings'));
    }

    public function mail() {
        $representative = Representative::where('user_id', Auth::id())->with('shop')->first();
        return view('shop.mail', compact('representative'));
    }

    public function sendMail(MailRequest $request) {
        $greet = $request->greet;
        $message = $request->message;
        $name = $request->name;
        $emails = User::select('email')->get();

        foreach($emails as $email) {
            Mail::send(new ShopMail($email,$greet,$message,$name));
        }

        return redirect('/shop/index')->with('message', 'メールを送信しました');
    }

    public function create(Request $request) {
        $user = Auth::user();
        $shop = Shop::find($request->id);

        return view('shop.shop', compact('user', 'shop'));
    }

    public function store(ShopStoreRequest $request) {
        $image = $request->file('imageURL');
        $imageURL = time() . '.' . $image->extension();
        Storage::disk('public')->putFileAs('images', $image, $imageURL);
        $shop = Shop::create([
            'name' => $request->name,
            'area' => $request->area,
            'genre' => $request->genre,
            'description' => $request->description,
            'imageURL' => $imageURL
        ]);
        Representative::create([
            'user_id' => Auth::id(),
            'shop_id' => $shop['id'],
        ]);

        return redirect('/shop/index')->with('message', '店舗情報を登録しました');
    }

    public function update(ShopUpdateRequest $request) {
        $representative = Representative::where('user_id', Auth::id())
        ->with('shop')
        ->first();

        if(!$request->imageURL) {
            $imageURL = $representative->shop->imageURL;
        } else {
            Storage::disk('public')->delete('images/' . $representative->shop->imageURL);
            $image = $request->file('imageURL');
            $imageURL = time() . '.' . $image->extension();
            Storage::disk('public')->putFileAs('images', $image, $imageURL);
        }

        Shop::find($request->shop_id)->update([
            'name' => $request->name,
            'area' => $request->area,
            'genre' => $request->genre,
            'description' => $request->description,
            'imageURL' => $imageURL
        ]);

        return redirect('/shop/index')->with('message', '店舗情報を変更しました');
    }
}
