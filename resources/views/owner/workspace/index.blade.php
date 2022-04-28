@extends('layouts.owner')

@section('page_title', 'Workspace')

@section('breadcramp_title', 'Workspace')

@section('content')

    <div class="main-content-inner">
        <div class="row">
            <!-- Progress Table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">My Desktops</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover progress-table text-center">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">City</th>
                                            <th scope="col">status</th>
                                            <th scope="col">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($workspaces as $workspace)
                                            <tr>
                                                <th scope="row">{{ $workspace->id }}</th>
                                                <td>{{ $workspace->name }}</td>
                                                <td>{{ $workspace->price }}$ /month</td>
                                                <td>{{ $workspace->city->city_name }}</td>

                                                <td>
                                                    @if ($workspace->status == 'Booked')
                                                        <span class="status-p bg-danger">
                                                            booked
                                                        </span>
                                                    @else
                                                        <span class="status-p bg-success">
                                                            available
                                                        </span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-3">
                                                            <div class="dropdown col-lg-6 col-md-4 col-sm-6">
                                                                <i class="ti-arrow-down text-primary" data-toggle="dropdown"></i>
                                                                <div class="dropdown-menu">
                                                                    @foreach ($workspace->features as $feature)
                                                                        <a class="dropdown-item">{{ $feature }}</a>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li class="mr-3">
                                                            <a href="#" class="text-secondary">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                        </li>

                                                        <li class="mr-3">
                                                            <a href="#" class="text-danger">
                                                                <i class="ti-trash"></i>
                                                            </a>
                                                        </li>

                                                    </ul>
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
        </div>
    </div>

@endsection
