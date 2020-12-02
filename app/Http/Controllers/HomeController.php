<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function calculate(Request $request)
    {
        $total = 0;

        for ($i = 1; $i <= $request->get( 'input_no'); $i++) {
            if($i <= 80) {
                $total = (float) $total + 2.50;
            } elseif ($i > 80 && $i <= 280) {
                $total = (float) $total + 6;
            } elseif ($i > 280 && $i <= 480) {
                $total = (float) $total + 7.20;
            } else {
                $total = (float) $total + 8.50;
            }
        }

        return view('calculate', compact( 'total' ))->render();
    }
}
