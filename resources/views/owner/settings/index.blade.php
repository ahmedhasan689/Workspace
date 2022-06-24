@extends('layouts.owner')

@section('page_title', 'Owner Settings')

@section('breadcramp_title', 'Owner Settings')

@section('content')

    <div class="container rounded bg-white mb-5">
        <div class="row">
            <div class="col-md-3 mb-3 ">
                <div class="card">
                    <div class="card-body ">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ $owner->image }}" alt="Admin" class="rounded-circle"
                                 width="186">
                            <div class="mt-3">
                                <h>
                                    {{ $owner->company_name }}
                                </h>
                                <p class="text-secondary mb-1">{{ $owner->full_name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $owner->full_name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $owner->email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $owner->phone_number }}
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $owner->city->city_name }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center m-2b">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <form action="{{ route('setting.update', ['id' => $owner->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mt-md-2">
                            <div class="col-md-12">
                                <label class="labels">Full Name</label>
                                <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" placeholder="Show its primary name" value="{{ $owner->full_name }}">
                                @error('full_name')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12 mt-2">
                                <label class="labels">Mobile Number</label>
                                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Show its primary number" value="{{ $owner->phone_number }}">
                                @error('phone_number')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="labels">City</label>
                                <select class="form-control @error('city') is-invalid @enderror" name="city">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" @if($city->id == $owner->city->id) selected @endif>
                                            {{ $city->city_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('city')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="labels">Company Name</label>
                                <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" placeholder="Show its primary number" value="{{ $owner->company_name }}">
                                @error('company_name')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="labels">Email address</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Show its primary address" value="{{ $owner->email }}">
                                @error('email')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="labels">photo</label>
                                <input type="file" name="avatar" class="form-control" placeholder="Show its primary address" value="">
                            </div>

                        </div>
                        <div class=" row col-6 mt-3">
                            <a href="#">Reset Password</a>
                        </div>
                        <div class="mt-3 text-center">
                            <button class="btn btn-primary profile-button" type="submit">
                                Save Profile
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
