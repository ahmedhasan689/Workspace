<?php

namespace App\Http\Controllers\Owner;

use App\Models\City;
use App\Models\Workspace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Cast\Array_;

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
        $features = Feature::all();
        return view('owner.workspace.create', compact('cities', 'features'));
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
            'address' => ['nullable', 'min:5'],
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
            'address' => $request->address,
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
        $workspace = Workspace::findOrFail($id);
        $cities = City::all();
        $features = Feature::all();
        return view('owner.workspace.edit', compact('workspace', 'cities', 'features'));
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

        $workspace = Workspace::findOrFail($id);

        $request->validate([
            'name' => ['required'],
            'description' => ['required', 'min:20', 'max:250'],
            'city_id' => ['required'],
            'type' => ['required'],
            'address' => ['nullable', 'min:5'],
            'price' => ['required', 'numeric'],
            'gallery' => ['nullable'],
            'features' => ['required'],
        ]);

        // Uploads Multi-image For Gallary
        $galleries = Workspace::all();

        // Get Gallery (Array) From Workspace Object
        foreach ($galleries as $data) {
            $array_of_image = $data->gallery;
        }

        $image_path = null;

        if ($request->hasFile('gallery')) {
            $files = $request->file('gallery'); // Uploaded File Objects

            foreach ($files as $file) {
                $image_path = $file->store('/', [
                    'disk' => 'gallery',
                ]);

                // Push ( Adding New Image In The End Of $array_of_image )
                $new_image = array_push($array_of_image, $image_path);
            }

        }else{
            $image_path = null;
        }

        $workspace->update([
            'name' => $request->name,
            'description' => $request->description,
            'city_id' => $request->city_id,
            'type' => $request->type,
            'address' => $request->address,
            'price' => $request->price,
            'gallery' => $array_of_image,
            'features' => $request->features,
        ]);

        toastr()->success('Workspace Successfully Updated !');

        return redirect()->route('workspace.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workspace = Workspace::find($id);

        Storage::disk('gallery')->delete($workspace->gallery);
        // unlink(public_path('gallery/' . $workspace->gallery));

        $workspace->delete();

        toastr()->success('Workspace Successfully Deleted !');

        return redirect()->route('workspace.index');

    }
}
