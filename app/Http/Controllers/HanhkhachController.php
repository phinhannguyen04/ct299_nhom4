<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use App\Models\Vemaybay;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HanhkhachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('passengers.personal');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $validation = $request->validate([
            'cccd'                  => 'required',
            'email'                 => 'required',
            'name'                  => 'required',
            'sdt'                   => 'required',
            'diachi'                => 'required',
            'ticket_chuyenbay_id'   => 'required',
            'ticket_loaive'         => 'required',
        ]);

        $alpha_bet = 'ABCDEFGHIJKLMNOPQRSTUVWSYZabcdefghijklmnopqrstuvwsyz';

        $code = substr(str_shuffle($alpha_bet), 0, 5) . Carbon::now()->day . substr(str_shuffle($alpha_bet), 0, 5) . Carbon::now()->year%2000 . substr(str_shuffle($alpha_bet), 0, 6) . Carbon::now()->second . substr(str_shuffle($alpha_bet), 0, 8) . Carbon::now()->second * mt_rand(1, 9999)+mt_rand(1, 100);

        $passenger = Passenger::create([
            'code'      => $code,
            'name'      => $validation['name'],
            'cccd'      => $validation['cccd'],
            'email'     => $validation['email'],
            'sdt'       => $validation['sdt'],
            'diachi'    => $validation['diachi']
        ]);

        /*
            lấy giá trị chuyenbay_id & loaive trong $validation
        */
        $chuyenbay_id   = $validation['ticket_chuyenbay_id'];
        $loaive         = $validation['ticket_loaive'];
        /*
            - truy vấn các vé máy bay có chuyenbay_id và loaive tương ứng đồng thời chưa được mua bởi người dùng khách hoặc người dùng tài khoản
            - lấy một vé bất kỳ có id & loại vé tương ứng
            - gắn guest_code cho vé vừa lấy
        */ 
        $ticket = Vemaybay::where('chuyenbay_id', $chuyenbay_id)
                ->where('loaive', $loaive)
                ->where(function($query) 
                {
                    $query->where('user_id', 0)
                        ->orWhereNull('user_id');
                })
                ->whereNull('guest_code')
                ->inRandomOrder()
                ->first();

        if ($ticket)
        {
            $ticket->guest_code = $code;
            $ticket->ngaymua    = Carbon::now()->format('Y-m-d');
            $ticket->save();
        }

        dd($code, $ticket);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
