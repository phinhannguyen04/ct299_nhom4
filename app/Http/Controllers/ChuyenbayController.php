<?php

namespace App\Http\Controllers;

use App\Models\Chuyenbay;
use App\Models\Vemaybay;
use Illuminate\Http\Request;

class ChuyenbayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function schedule()
    {
        //
        $flights = Chuyenbay::all();
        return view('flights.schedule', compact('flights'));
    }

    public function index()
    {
        //
        return view('tickets.tickets');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getInformation (Request $req)
    {
        // dd($req);
        $validation = $req->validate([
            'mavemaybay' => 'required',
        ]);

        $ticket = Vemaybay::where('mavemaybay', $validation['mavemaybay'])->first();
        if ($ticket)
        {
            // dd ($data);
            return view('tickets.information', compact('ticket'));
        }
        else return 'không có dữ liệu';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validation = $request->validate([
            'flight_id'             => 'required',
            'flight_mavemaybay'     => 'required',
            'flight_price'          => 'required',
            'totalPassengers'       => 'required'
        ]);

        $totalPassengers = $validation['totalPassengers'];

        // lấy ra các vé tương ứng với chuyến bay và số lượng hành khách 
        $ticket = Vemaybay::where('chuyenbay_id', $validation['flight_id'])
                ->where('gia', $validation['flight_price'])
                ->first();
        
        // kiểm tra dãy collection tickets nếu không có thì . . .
        if (!$ticket) {
            return 'Khong tim thay ve cua chuyen bay ' . $validation['flight_mavemaybay'];
        }
        // lấy được thông tin vé
        // return view('passengers.personal', compact('ticket'));
        return redirect()->route('passengers.index')
            ->with('ticket', $ticket)
            ->with('totalPassengers', $totalPassengers);
    }

    /*
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
