<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerSettingsController extends Controller
{
    public function edit()
    {
        $customer = User::where('id', Auth::user()->id)->first();
        $cities = City::all();
        return view('customer.settings.edit', compact('customer', 'cities'));
    }

    public function update(Request $request, $id)
    {

        $customer = User::where('id', Auth::user()->id)->findOrFail($id);

        $request->validate([
            'full_name' => ['required', 'min:3'],
            'phone_number' => ['required', 'numeric', 'min:10'],
            'city' => ['required'],
            'email' => ['required', 'email'],
            'avatar' => ['nullable'],
        ]);

        $image = $customer->avatar;

        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');

            $image = $file->store('/', [
                'disk' => 'avatar',
            ]);

            $request->merge([
                'avatar' => $image,
            ]);
        }else{
            $image = $customer->avatar;
        }

        $customer->update([
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'city_id' => $request->city,
            'email' => $request->email,
            'avatar' => $image,
        ]);

//        $customer->update([
//            'full_name' => $request->full_name,
//            'phone_number' => $request->phone_number,
//            'city_id' => $request->city,
//            'email' => $request->email,
//        ]);

        toastr()->success('Updated Successfully');

        return redirect()->back();
    }
}
