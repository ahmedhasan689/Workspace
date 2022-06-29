@extends('layouts.customer')

@section('page_title', 'My Workspaces')

@section('breadcramp_title', 'My Workspaces')

@section('content')
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">My WorkSpaces</h4>
                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table table-hover progress-table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Desktop Name</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Price per day</th>
                                    <th scope="col">Total price</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach( $tainents as $tainent )
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        {{ $tainent->workspace->name }}
                                    </td>
                                    <td>
                                        {{ $tainent->start_date }}
                                    </td>
                                    <td>
                                        {{ $tainent->end_date }}
                                    </td>
                                    <td>{{ $tainent->per_day }} $</td>
                                    <td>
                                        {{ $tainent->total }}$
                                    </td>
                                    <td>
                                        <a href="#" class="text-danger">
                                            <i class="ti-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
