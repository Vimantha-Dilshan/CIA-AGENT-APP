@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="row">
                <div class="col-md-4">
                    <div class="container py-5">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div>
                                <div class="card" style="color: #4B515D; border-radius: 35px;">
                                    <div class="card-body p-4">

                                        <div class="d-flex">
                                            <h6 class="flex-grow-1">Warsaw</h6>
                                            <h6>15:07</h6>
                                        </div>

                                        <div class="d-flex flex-column text-center mt-5 mb-4">
                                            <h6 class="display-4 mb-0 font-weight-bold" style="color: #198754;"> 13°C </h6>
                                            <span class="small" style="color: #868B94">Stormy</span>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1" style="font-size: 1rem;">
                                                <div><i class="fas fa-wind fa-fw" style="color: #868B94;"></i> <span
                                                        class="ms-1"> 40 km/h
                                                    </span></div>
                                                <div><i class="fas fa-tint fa-fw" style="color: #868B94;"></i> <span
                                                        class="ms-1"> 84% </span>
                                                </div>
                                                <div><i class="fas fa-sun fa-fw" style="color: #868B94;"></i> <span
                                                        class="ms-1"> 0.2h </span>
                                                </div>
                                            </div>
                                            <div>
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-weather/ilu1.webp"
                                                    width="100px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="container py-5">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div>
                                <div class="card" style="color: #4B515D; border-radius: 35px;">
                                    <div class="card-body p-4">

                                        <div class="d-flex">
                                            <h6 class="flex-grow-1">Warsaw</h6>
                                            <h6>15:07</h6>
                                        </div>

                                        <div class="d-flex flex-column text-center mt-5 mb-4">
                                            <h6 class="display-4 mb-0 font-weight-bold" style="color: #198754;"> 13°C </h6>
                                            <span class="small" style="color: #868B94">Stormy</span>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1" style="font-size: 1rem;">
                                                <div><i class="fas fa-wind fa-fw" style="color: #868B94;"></i> <span
                                                        class="ms-1"> 40 km/h
                                                    </span></div>
                                                <div><i class="fas fa-tint fa-fw" style="color: #868B94;"></i> <span
                                                        class="ms-1"> 84% </span>
                                                </div>
                                                <div><i class="fas fa-sun fa-fw" style="color: #868B94;"></i> <span
                                                        class="ms-1"> 0.2h </span>
                                                </div>
                                            </div>
                                            <div>
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-weather/ilu1.webp"
                                                    width="100px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="container py-5">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class=>
                                <div class="card" style="color: #4B515D; border-radius: 35px;">
                                    <div class="card-body p-4">

                                        <div class="d-flex">
                                            <h6 class="flex-grow-1">Warsaw</h6>
                                            <h6>15:07</h6>
                                        </div>

                                        <div class="d-flex flex-column text-center mt-5 mb-4">
                                            <h6 class="display-4 mb-0 font-weight-bold" style="color: #198754;"> 13°C </h6>
                                            <span class="small" style="color: #868B94">Stormy</span>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1" style="font-size: 1rem;">
                                                <div><i class="fas fa-wind fa-fw" style="color: #868B94;"></i> <span
                                                        class="ms-1"> 40 km/h
                                                    </span></div>
                                                <div><i class="fas fa-tint fa-fw" style="color: #868B94;"></i> <span
                                                        class="ms-1"> 84% </span>
                                                </div>
                                                <div><i class="fas fa-sun fa-fw" style="color: #868B94;"></i> <span
                                                        class="ms-1"> 0.2h </span>
                                                </div>
                                            </div>
                                            <div>
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-weather/ilu1.webp"
                                                    width="100px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
