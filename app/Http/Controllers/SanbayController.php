<?php

namespace App\Http\Controllers;

use App\Models\Sanbay;
use Illuminate\Http\Request;

class SanbayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sanbays = Sanbay::all();
        return view('galaxy.index', compact('sanbays'));
    }
}
