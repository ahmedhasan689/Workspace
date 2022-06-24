<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $workspaces = Workspace::all();
        return view('customer.index', compact('workspaces'));
    }
}
