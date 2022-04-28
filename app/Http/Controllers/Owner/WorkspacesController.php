<?php

namespace App\Http\Controllers\Owner;

use App\Models\City;
use App\Models\Workspace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WorkspacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onwer_id = Auth::guard( session('guardName') )->user()->id;
        $workspaces = Workspace::where('owner_id', "=" , $onwer_id )->get();
        return view('owner.workspace.index', compact('workspaces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('owner.workspace.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required', 'min:20', 'max:250'],
            'city_id' => ['required'],
            'type' => ['required'],
            'price' => ['required', 'numeric'],
            'gallery' => ['nullable'],
            'features' => ['required'],
        ]);

        // Uploads Multi-image For Gallary
        $image_path = null;

        if ($request->hasFile('gallery')) {
            $files = $request->file('gallery'); // Uploaded File Objects

            foreach ($files as $file) {
                $image_path = $file->store('/', [
                    'disk' => 'gallery',
                ]);

                $image[] = $image_path;
            }

        }else{
            $image_path = null;
        }

        $workspace = Workspace::create([
            'name' => $request->name,
            'description' => $request->description,
            'city_id' => $request->city_id,
            'type' => $request->type,
            'price' => $request->price,
            'gallery' => $image,
            'features' => $request->features,
            'status' => 'Available',
            'owner_id' => Auth::guard(session('guardName'))->user()->id,
        ]);

        toastr()->success('Workspace Successfully Created');

        return redirect()->route('workspace.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
