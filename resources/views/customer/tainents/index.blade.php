@extends('layouts.customer')

@section('page_title', 'My Tainents')

@section('breadcramp_title', 'My Tainents')

@section('content')
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">My Tainents</h4>
                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table table-hover progress-table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Onwer Name</th>
                                    <th scope="col">Workspace Name</th>
                                    <th scope="col">Total price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach( $tainents as $tainent )
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        {{ $tainent->owner->full_name }}
                                    </td>
                                    <td>
                                        {{ $tainent->workspace->name }}
                                    </td>
                                    <td>
                                        {{ $tainent->total }}$
                                    </td>
                                    <td>
                                        @if($tainent->status == 'Unpaid')
                                            <span class="text-danger">
                                                {{ 'Unpaid'}}
                                            </span>
                                        @else
                                            <span class="text-success">
                                                {{ 'Paid'}}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($tainent->status == 'Unpaid')
                                        <form action="{{ route('CreatePayment',  $tainent->id ) }}" method="POST">
                                            @csrf
                                            @method('GET')

                                            <button type="submit" class="btn btn-warning" class="text-white" style="color: #fff">
                                                Paid
                                            </button>
                                        </form>
                                        @else
                                            {{-- <i class="fa-solid fa-trash-arrow-up"></i> --}}
                                            <a href="#" class="text-danger">
                                                <i class="ti-trash"></i>
                                            </a>
                                        @endif
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
