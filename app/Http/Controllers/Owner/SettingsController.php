<?php

namespace App\Http\Controllers\Owner;

use App\Models\City;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use App\Models\Owner;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $auth_owner = Auth::guard(session('guardName'))->user()->id;

        $owner = Owner::where('id', $auth_owner)->first();

        $cities = City::all();

        return view('owner.settings.index', compact('owner', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $owner = Owner::findOrFail($id);

        $request->validate([
            'full_name' => ['required', 'min:3'],
            'phone_number' => ['required', 'numeric', 'min:10'],
            'city' => ['required'],
            'company_name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'avatar' => ['nullable'],
        ]);

        $image = null;

        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');

            $image = $file->store('/', [
                'disk' => 'avatar',
            ]);
        }else{
            $image = $owner->avatar;
        }

        $owner->update([
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'city_id' => $request->city,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'avatar' => $image,
        ]);

        toastr()->success('Updated Successfully');

        return redirect()->back();
    }

}
