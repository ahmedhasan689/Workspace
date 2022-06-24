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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Dedicated Desk - A360</td>
                                    <td>17/2/2022</td>
                                    <td>
                                        8/1/2022
                                    </td>
                                    <td>10 $</td>
                                    <td>
                                        240 $
                                    </td>
                                    <td><a href="#" class="text-danger"><i class="ti-trash"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Office Suite - G-963</td>
                                    <td>1/2/2022</td>
                                    <td>
                                        30/2/2022
                                    </td>
                                    <td>10 $</td>
                                    <td>
                                        450 $
                                    </td>
                                    <td><a href="#" class="text-danger"><i class="ti-trash"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Dedicated Desk - D-005</td>
                                    <td>9/4/2022</td>
                                    <td>
                                        3/2/2023
                                    </td>
                                    <td>10 $</td>
                                    <td>
                                        70 $
                                    </td>
                                    <td><a href="#" class="text-danger"><i class="ti-trash"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Dedicated Desk - A360</td>
                                    <td>2/2/2022</td>
                                    <td>
                                        10/8/2022
                                    </td>
                                    <td>10 $</td>
                                    <td>
                                        900 $
                                    </td>
                                    <td><a href="#" class="text-danger"><i class="ti-trash"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Office Suite - G-963</td>
                                    <td>3/4/2022</td>
                                    <td>
                                        17/2/2022
                                    </td>
                                    <td>10 $</td>
                                    <td>
                                        150 $
                                    </td>
                                    <td><a href="#" class="text-danger"><i class="ti-trash"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Dedicated Desk - D-005</td>
                                    <td>1/1/2022</td>
                                    <td>
                                        1/2/2022
                                    </td>
                                    <td>10 $</td>
                                    <td>
                                        140 $
                                    </td>
                                    <td><a href="#" class="text-danger"><i class="ti-trash"></i></a></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
