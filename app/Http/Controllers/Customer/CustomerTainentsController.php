<?php

namespace App\Http\Controllers\Customer;

use App\Models\Tainant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerTainentsController extends Controller
{
    public function index()
    {
        $tainents = Tainant::where('user_id', Auth::user()->id)->get();

        return view('customer.tainents.index', compact('tainents'));
    }
}
