@extends('layouts.app')
@section('content')
    <div class="container padding-home">

        <h1 class="title-color">Alessandro Pagliuca</h1>
        <small class="fw-semibold blue-ligth-01">Full Stack Web Developer</small>

        <section class="pt-5">
            <h2 class="display-5 fw-bold title-color">
                Welcome to my Portfolio
            </h2>

            <div class="d-flex flex-column justify-content-center align-items-center padding-projects">
                <h3 class="py-3 blue-ligth-01 text-uppercase">Projects</h3>

                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 d-flex flex-column justify-content-center align-items-center p-1">
                        <div class="card">
                            <img class="card-img-top" src="" alt="Card image cap">
                        </div>
                        <div class="card-body pt-1">
                            <p class="fs-5 title-color">Title project</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 d-flex flex-column justify-content-center align-items-center p-1">
                        <div class="card">
                            <img class="card-img-top" src="" alt="Card image cap">
                        </div>
                        <div class="card-body pt-1">
                            <p class="fs-5 title-color">Title project</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 d-flex flex-column justify-content-center align-items-center p-1">
                        <div class="card">
                            <img class="card-img-top" src="" alt="Card image cap">
                        </div>
                        <div class="card-body  pt-1">
                            <p class="fs-5 title-color">Title project</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
