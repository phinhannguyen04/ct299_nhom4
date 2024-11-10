<?php

namespace App\Http\Controllers;

use App\Mail\MailClass;
use App\Models\Chuyenbay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function sendEmail() { 
        $details = [ 'title' => 'Mail from Laravel', 'body' => 'This is a test email using Laravel.' ]; 
        
        Mail::to('phinhannguyen04@gmail.com')->send(new MailClass($details)); 
        
        return "Email sent successfully!";
        
    }

    public function index()
    {
        //
        self::sendEmail();
        return view('galaxy.index');
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
        // dd($request['departure']);
        $validation = $request->validate([
            'departure'         => 'required',
            'destination'       => 'required',
            'departure-date'    => 'required',
            'adults'            => 'required',
            'children'          => 'required'
        ]);

        $totalPassengers = $validation['adults'] + $validation['children'];

        // biến $flight lưu tất cả các chuyến bay có có điểm đầu và cuối giống nhau trong cùng ngày
        $flights = Chuyenbay::where('xuatphat', $validation['departure'])
            ->where('diemden', $validation['destination'])
            ->wheredate('ngaybay', $validation['departure-date'])
            ->get();

        
        // $flight = Chuyenbay::with('sanbayXuatphat', 'sanbayDiemden')->findOrFail($flights->first()->id);

        if ($flights->isEmpty()) {
            return 'Không tìm thấy chuyến bay nào cho ngày đã chọn.';
        }

        //dd($totalPassengers);

        return redirect()->route('tickets.index')
            ->with('flights', $flights)
            ->with('totalPassengers', $totalPassengers);
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
