<?php

namespace App\Http\Controllers\Owner;

use App\Models\Workspace;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function index()
    {
        $owner = Auth::guard(session('guardName'))->user()->id;

        $workspaces = Workspace::where('owner_id', $owner)->get();

        return view('owner.dashboard', compact('workspaces'));
    }
}
