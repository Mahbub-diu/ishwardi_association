@extends('layouts.app-frontend')




@section('content')
    <section class="common-banner-main"
        data-background="{{ asset('public/front-end/img/new-home/dashboard/common-banner.webp') }}">

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="common-banner-text">
                        <h2>Membership Upgrade</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">User Profile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Membership Upgrade</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="member-dashboard-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="dashboard-sidebar-main shadow-sm">
                        <div class="member-profile-image">
                            <img src=" {{ asset('public/front-end/img/new-home/dashboard/team-one.jpg') }}"
                                alt="team-one.png">
                        </div>
                        <div class="name"> Mahbubur Rahman</div>
                        <div class="mobile">+8801743455691</div>
                        <div class="dashboard-sidebar-menu">
                            <ul>
                                <li>
                                    <a href="#"><i class="fas fa-power-off"></i> Log out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <div class="dashboard-details-box">
                        <div class="common-fieldset-main">
                            <fieldset class="common-fieldset">
                                <legend class="rounded">profile information</legend>
                                <div class="custom-buy-flex">
                                    <div class="single-box">
                                        <div class="icon"><i class="fa-regular fa-address-card"></i></div>
                                        <div class="title">buy membership</div>
                                        <a href="{{ url('/buy-membership') }}"></a>
                                    </div>
                                    <div class="single-box">
                                        <div class="icon">
                                            <i class="fa-regular fa-user"></i>
                                        </div>
                                        <div class="title">update profile</div>
                                        <a href="{{ url('/update-member-profile') }}"></a>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
