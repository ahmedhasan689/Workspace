@extends('layouts.owner')

@section('page_title', 'Dashboard')

@section('breadcramp_title', 'Home')

@section('content')

    <!--top page start-->
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-4 mt-3 mb-3">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="ti-layers-alt"></i> Num Of Desktop</div>
                            <h2>{{ count($workspaces) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-md-3 mb-3">
                <div class="card">
                    <div class="seo-fact sbg2">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="ti-check"></i> booked </div>
                            <h2>{{ count($workspaces->where('status', 'booked')) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-md-3 mb-3">
                <div class="card">
                    <div class="seo-fact sbg3">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="ti-bookmark-alt"></i> available </div>
                            <h2>{{ count($workspaces->where('status', 'Available')) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- top page end -->

    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">New Rentals</h4>
                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table table-hover progress-table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Desktop Name</th>
                                    <th scope="col">Tenant name</th>
                                    <th scope="col">Tenant phone</th>
                                    <th scope="col">e-mail</th>
                                    <th scope="col">Start Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Dedicated Desk - A360</td>
                                    <td>NVN Kh</td>
                                    <td>
                                        +972591111111
                                    </td>
                                    <td>nvn@gmail.com</td>
                                    <td>
                                        17/2/2022
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Office Suite - G-963</td>
                                    <td>Ah Ty</td>
                                    <td>
                                        +972595555555
                                    </td>
                                    <td>ahmed@gmail.com</td>
                                    <td>
                                        7/5/2022
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Dedicated Desk - D-005</td>
                                    <td>Ah mu</td>
                                    <td>
                                        +972599999999
                                    </td>
                                    <td>ahmu@gmail.com</td>
                                    <td>
                                        9/8/2022
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Dedicated Desk - A360</td>
                                    <td>NVN Kh</td>
                                    <td>
                                        +972591111111
                                    </td>
                                    <td>nvn@gmail.com</td>
                                    <td>
                                        17/2/2022
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Office Suite - G-963</td>
                                    <td>Ah Ty</td>
                                    <td>
                                        +972595555555
                                    </td>
                                    <td>ahmed@gmail.com</td>
                                    <td>
                                        7/5/2022
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Dedicated Desk - D-005</td>
                                    <td>Ah mu</td>
                                    <td>
                                        +972599999999
                                    </td>
                                    <td>ahmu@gmail.com</td>
                                    <td>
                                        9/8/2022
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
