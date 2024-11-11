<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Mail\MailClass;
use App\Models\Vemaybay;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
        // dd($request);
        
        $total_price = $request['total_price'];

        // dd($total_price);

        // Lấy dữ liệu hành khách từ đầu vào
        $passengers = $request->input('passengers');
        // dd($passengers);
        
        $alpha_bet = 'ABCDEFGHIJKLMNOPQRSTUVWSYZabcdefghijklmnopqrstuvwsyz0123456789';
    
        foreach ($passengers as $passengerData) {
            // Xác thực dữ liệu hành khách
            $validator = Validator::make($passengerData, [
                'cccd'                  => 'required',
                'email'                 => 'required|email',
                'name'                  => 'required',
                'sdt'                   => 'required',
                'diachi'                => 'required',
                'ticket_chuyenbay_id'   => 'required',
                'ticket_loaive'         => 'required',
            ]);
    
            // Kiểm tra xem xác thực có thất bại hay không
            if ($validator->fails()) {
                // Xử lý lỗi xác thực tại đây
                return response()->json(['errors' => $validator->errors()], 422);
            }
    
            // Dữ liệu đã xác thực
            $validatedData = $validator->validated();
    
            // Tạo mã cho hành khách
            $code = substr(str_shuffle($alpha_bet), 0, 5) . date('d') . substr(str_shuffle($alpha_bet), 0, 5) . date('y') . substr(str_shuffle($alpha_bet), 0, 6) . date('s') . substr(str_shuffle($alpha_bet), 0, 8) . (date('s') * mt_rand(1, 9999) + mt_rand(1, 100));
    
            // Tạo hành khách mới
            $passenger = Passenger::create([
                'code'      => $code,
                'name'      => $validatedData['name'],
                'cccd'      => $validatedData['cccd'],
                'email'     => $validatedData['email'],
                'sdt'       => $validatedData['sdt'],
                'diachi'    => $validatedData['diachi']
            ]);
            
            
            // Lấy giá trị chuyenbay_id & loaive
            $chuyenbay_id = $validatedData['ticket_chuyenbay_id'];
            $loaive = $validatedData['ticket_loaive'];
    
            // Truy vấn vé máy bay phù hợp
            $ticket = Vemaybay::where('chuyenbay_id', $chuyenbay_id)
                    ->where('loaive', $loaive)
                    ->where(function($query) {
                        $query->where('user_id', 1)
                              ->orWhereNull('user_id');
                    })
                    ->orWhereNull('guest_code')
                    ->inRandomOrder()
                    ->first();
    
            if ($ticket) {
                $ticket->guest_code     = $code;
                $ticket->ngaymua        = date('Y-m-d');
                $ticket->save();


                 // Thêm thông tin vé đã cập nhật vào mảng kết quả
                $ticketsUpdated[] = [
                    'mavemaybay'        => $ticket->mavemaybay,
                    'ticket_id'         => $ticket->id,
                    'chuyenbay_id'      => $ticket->chuyenbay_id,
                    'loaive'            => $ticket->loaive,
                    'guest_code'        => $ticket->guest_code,
                    'ngaymua'           => $ticket->ngaymua,
                ];
            }
        }
        self::sendEmail($ticketsUpdated);
        
        return view('payment', compact('total_price'));
    }
    

    public static function sendEmail($ticketsUpdated) 
    { 
        
        // $details = [ 'title' => 'Mail from Laravel', 'body' => 'This is a test email using Laravel.' ]; 
        
        foreach ($ticketsUpdated as $info)
        {
            $ticket = Vemaybay::where('mavemaybay', $info['mavemaybay'])->first();

            $passenger_email = Passenger::where('code', $info['guest_code'])->value('email'); 
            
            Mail::to($passenger_email)->send(new MailClass($ticket)); 
        }
        
        //echo "Email sent successfully!";
        
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
