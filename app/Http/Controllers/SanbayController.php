<?php

namespace App\Http\Controllers;

use App\Models\Sanbay;
use App\Mail\MailClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SanbayController extends Controller
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
        $mess =self::sendEmail();
        // $sanbays = Sanbay::all();
        // return view('galaxy.index', compact('sanbays'));
        return $mess;
    }
}
