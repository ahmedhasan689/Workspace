@extends('layouts.customer')

@section('page_title', 'Exploration')

@section('breadcramp_title', 'Exploration')

@section('content')

    <div class="card-area">
        <div class="row">
            @foreach( $workspaces as $workspace )
                <div class="col-lg-4 col-md-6 mt-5">
                <div class="card card-bordered">
                    <img class="card-img-top img-fluid" src="{{ asset('assets/images/card/card-img1.jpg') }}" alt="image">
                    <div class="card-body">
                        <h5 class="title">
                            {{ $workspace->name }}
                        </h5>
                        <p class="card-text">
                            {{ $workspace->description }}
                        </p>
                        </p>
                        <p class="card-text">
                            {{ $workspace->address  }}
                        </p>
                        <a href="#" class="btn btn-primary">Rent</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>

@endsection
