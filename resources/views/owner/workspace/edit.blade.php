@extends('layouts.owner')

@section('page_title', 'Edit Workspace')

@section('breadcramp_title', 'Edit Workspace')

@section('content')

    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Edit Desktop</h4>
                <form action="{{ route('workspace.update', ['id' => $workspace->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">
                            Desktop Name
                        </label>
                        <input class="form-control" name="name" type="text" placeholder="Recall the previously Name" id="example-text-input" value="{{ $workspace->name }}">
                    </div>

                    {{-- Description --}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Description</span>
                        </div>
                        <textarea class="form-control" placeholder=" Recall the previously written text " aria-label="With textarea" name="description">
                            {{ $workspace->description }}
                        </textarea>
                    </div>

                    {{-- City --}}
                    <div class="form-group">
                        <label class="col-form-label">City</label>
                        <select class="form-control" name="city_id">
                            <option>Call selected city</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" @if ($workspace->city->id == $city->id) selected @endif>
                                    {{ $city->city_name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- Workspace Type --}}
                    <div class="form-group">
                        <label class="col-form-label">type</label>
                        <select class="form-control" name="type">
                            <option>select workSpace type</option>
                            <option @if ($workspace->type == 'Private Office') selected @endif>Private Office</option>
                            <option @if ($workspace->type == 'Public Office') selected @endif>Public Office</option>
                            <option @if ($workspace->type == 'Workspace') selected @endif>Workspace</option>
                            <option @if ($workspace->type == 'Skype Room') selected @endif>Skype Room</option>
                        </select>
                    </div>

                    {{-- Address --}}
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Address</label>
                        <input class="form-control" name="address" type="text" placeholder="Recall the previously Address" id="example-text-input" value="{{ $workspace->address }}">
                    </div>

                    {{-- Price --}}
                    <div class="input-group">
                        <input type="text" class="form-control" name="price" placeholder="Recall the previously price $$ selected"
                            aria-label="Amount (to the nearest dollar)" value="{{ $workspace->price }}">
                        <div class="input-group-append">
                            <span class="input-group-text">$</span>
                            <span class="input-group-text">0.00</span>
                        </div>
                    </div>

                    <br>

                    {{-- Gallery --}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="gallery[]" multiple>
                            <label class="custom-file-label" for="inputGroupFile01">Desktop Imge</label>
                        </div>
                    </div>

                    {{-- Features --}}
                    <div>
                        <label class="col-form-label">Available features :</label>
                        @foreach ($features as $feature)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="features[]" id="{{ $feature->id }}" value="{{ $feature->feature_name }}"
                                @if (in_array($feature->feature_name, $workspace->features))
                                    checked
                                @endif
                                >
                                <label class="custom-control-label" for="{{ $feature->id }}">
                                    {{ $feature->feature_name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save</button>
                </form>
            </div>
        </div>
    </div>

@endsection
