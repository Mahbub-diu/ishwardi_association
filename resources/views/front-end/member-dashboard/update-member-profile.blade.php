@extends('layouts.app-frontend')




@section('content')
    <section class="common-banner-main"
        data-background="{{ asset('public/front-end/img/new-home/dashboard/common-banner.webp') }}">

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="common-banner-text">
                        <h2>update profile</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">User Profile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">update profile</li>
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
                        <div class="common-fieldset-main mb-0">
                            <fieldset class="common-fieldset">
                                <legend class="rounded">Update profile information</legend>
                                <div class="update-address-info-tab">
                                    <form id="memberMultiStepForm">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="basic-onfo-tab" data-bs-toggle="tab"
                                                    data-bs-target="#basic-onfo-tab-pane" type="button" role="tab"
                                                    aria-controls="basic-onfo-tab-pane" aria-selected="true">Basic
                                                    Info</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="address-onfo-tab" data-bs-toggle="tab"
                                                    data-bs-target="#address-onfo-tab-pane" type="button" role="tab"
                                                    aria-controls="address-onfo-tab-pane" aria-selected="false">Address
                                                    Info</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="others-onfo-tab" data-bs-toggle="tab"
                                                    data-bs-target="#others-onfo-tab-pane" type="button" role="tab"
                                                    aria-controls="others-onfo-tab-pane" aria-selected="false">Others
                                                    Info</button>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="myTabContent">
                                            <!-- Step 1: Basic Info -->
                                            <div class="tab-pane fade show active p-3" id="basic-onfo-tab-pane"
                                                role="tabpanel" aria-labelledby="basic-onfo-tab" tabindex="0">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="name" class="form-label">Full Name *</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" disabled value="Mahbubur Rahman">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="phone" class="form-label">Phone Number *</label>
                                                            <input type="text" class="form-control" id="phone"
                                                                name="phone" disabled value="+8801743455691">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="emergencyphone" class="form-label">Emergency contact
                                                                Number *</label>
                                                            <input type="text" class="form-control" id="emergencyphone"
                                                                name="emergencyphone" value="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="email" class="form-label">Email *</label>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="Blood Group" class="form-label">Blood Group
                                                                *</label>
                                                            <select class="form-select" aria-label="Blood Group"
                                                                name="blood_group" required>
                                                                <option selected>Blood Group</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="nid" class="form-label">nid Number *</label>
                                                            <input type="text" class="form-control" id="nid"
                                                                name="nid" value="" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="dob" class="form-label">Date of Birth
                                                                *</label>
                                                            <input type="date" class="form-control" id="dob"
                                                                name="dob" value="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="gender" class="form-label">select gender
                                                                *</label>
                                                            <select class="form-select" aria-label="gender"
                                                                name="gender" required>
                                                                <option selected>Select gender</option>
                                                                <option value="1">male</option>
                                                                <option value="2">female</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="profile-img" class="form-label">profile
                                                                image *</label>
                                                            <input type="file" class="form-control" id="profile-img"
                                                                name="profile-img" value="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="religion" class="form-label">religion</label>
                                                            <input type="text" class="form-control" id="religion"
                                                                name="religion" value="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="update-profile-btn">
                                                            <button type="button"
                                                                class="btn as-btn nextBtn">Next</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Step 2: Address Info -->
                                            <div class="tab-pane fade p-3" id="address-onfo-tab-pane" role="tabpanel"
                                                aria-labelledby="address-onfo-tab" tabindex="0">
                                                <div class="common-fieldset-main">
                                                    <fieldset class="common-fieldset pb-0">
                                                        <legend class="rounded">present address :</legend>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="present_division"
                                                                        class="form-label">select
                                                                        division
                                                                        *</label>
                                                                    <select class="form-select"
                                                                        aria-label="present_division"
                                                                        name="present_division" required>
                                                                        <option selected>Select division</option>
                                                                        <option value="1">Dhaka</option>
                                                                        <option value="2">Mymensingh</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="present_district"
                                                                        class="form-label">select
                                                                        district
                                                                        *</label>
                                                                    <select class="form-select"
                                                                        aria-label="present_district"
                                                                        name="present_district" required>
                                                                        <option selected>Select district</option>
                                                                        <option value="1">Dhaka</option>
                                                                        <option value="2">Mymensingh</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="present_district"
                                                                        class="form-label">select
                                                                        upazila
                                                                        *</label>
                                                                    <select class="form-select"
                                                                        aria-label="present_upazila"
                                                                        name="present_upazila" required>
                                                                        <option selected>Select upazila</option>
                                                                        <option value="1">Dhaka</option>
                                                                        <option value="2">Mymensingh</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="house_no" class="form-label">House
                                                                        Number</label>
                                                                    <input type="text" class="form-control"
                                                                        id="house_no" name="house_no" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="road_no" class="form-label">road
                                                                        Number</label>
                                                                    <input type="text" class="form-control"
                                                                        id="road_no" name="road_no" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="area_name" class="form-label">area
                                                                        name</label>
                                                                    <input type="text" class="form-control"
                                                                        id="area_name" name="area_name" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="common-fieldset-main">
                                                    <fieldset class="common-fieldset pb-0">
                                                        <legend class="rounded">permanent address :</legend>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="checkDefault">
                                                                    <label class="form-check-label" for="checkDefault">
                                                                        same as present address
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="permanent_division"
                                                                        class="form-label">select
                                                                        division
                                                                        *</label>
                                                                    <select class="form-select"
                                                                        aria-label="permanent_division"
                                                                        name="permanent_division" required>
                                                                        <option selected>Select division</option>
                                                                        <option value="1">Dhaka</option>
                                                                        <option value="2">Mymensingh</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="permanent_district"
                                                                        class="form-label">select
                                                                        district
                                                                        *</label>
                                                                    <select class="form-select"
                                                                        aria-label="permanent_district"
                                                                        name="permanent_district" required>
                                                                        <option selected>Select district</option>
                                                                        <option value="1">Dhaka</option>
                                                                        <option value="2">Mymensingh</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="permanent_district"
                                                                        class="form-label">select
                                                                        upazila
                                                                        *</label>
                                                                    <select class="form-select"
                                                                        aria-label="permanent_upazila"
                                                                        name="permanent_upazila" required>
                                                                        <option selected>Select upazila</option>
                                                                        <option value="1">Dhaka</option>
                                                                        <option value="2">Mymensingh</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="house_no" class="form-label">House
                                                                        Number</label>
                                                                    <input type="text" class="form-control"
                                                                        id="house_no" name="house_no" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="road_no" class="form-label">road
                                                                        Number</label>
                                                                    <input type="text" class="form-control"
                                                                        id="road_no" name="road_no" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="area_name" class="form-label">area
                                                                        name</label>
                                                                    <input type="text" class="form-control"
                                                                        id="area_name" name="area_name" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="update-profile-btn">

                                                    <button type="button" class="btn prevBtn">Previous</button>
                                                    <button type="button" class="btn as-btn nextBtn">Next</button>
                                                </div>

                                            </div>

                                            <!-- Step 3: Others Info -->
                                            <div class="tab-pane fade p-3" id="others-onfo-tab-pane" role="tabpanel"
                                                aria-labelledby="others-onfo-tab" tabindex="0">

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="father-name" class="form-label">father's
                                                                name</label>
                                                            <input type="text" class="form-control" id="father-name"
                                                                name="father-name" value="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="mother-name" class="form-label">mother's
                                                                name</label>
                                                            <input type="text" class="form-control" id="mother-name"
                                                                name="mother-name" value="" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="mother-name" class="form-label">maritual statuys
                                                            </label>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="inlineRadioOptions" id="married"
                                                                    value="option1">
                                                                <label class="form-check-label"
                                                                    for="married">married</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="inlineRadioOptions" id="inlineRadio2"
                                                                    value="option2">
                                                                <label class="form-check-label" for="inlineRadio2">un
                                                                    married</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 col-lg-4" id="fieldForSpouse">
                                                        <div class="form-group">
                                                            <label for="spouse-name" class="form-label">spouse
                                                                name</label>
                                                            <input type="text" class="form-control" id="spouse-name"
                                                                name="spouse-name" value="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="gender" class="form-label">extra curricular
                                                                activities </label>
                                                            <select class="form-select" aria-label="gender"
                                                                name="gender" required>
                                                                <option selected>Select activities</option>
                                                                <option value="1">activities 1</option>
                                                                <option value="2">activities 2</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="update-profile-btn">

                                                    <button type="button" class="btn prevBtn">Previous</button>
                                                    <button type="button" class="btn as-btn nextBtn">update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {

            // Initially hide spouse field
            $('#fieldForSpouse').hide();

            // Show/hide spouse field based on marital status
            $('input[name="inlineRadioOptions"]').change(function() {
                if ($('#married').is(':checked')) {
                    $('#fieldForSpouse').slideDown();
                    $('#spouse-name').attr('required', true);
                } else {
                    $('#fieldForSpouse').slideUp();
                    $('#spouse-name').removeAttr('required');
                }
            });

            // Multi-step form navigation
            $('.nextBtn').click(function() {
                let currentTab = $(this).closest('.tab-pane');
                let inputs = currentTab.find('input:visible, select:visible');

                let valid = true;

                // Validate visible inputs only
                inputs.each(function() {
                    if ($(this).prop('required')) {
                        if (!$(this).val()) {
                            $(this).addClass('is-invalid');
                            valid = false;
                        } else {
                            $(this).removeClass('is-invalid');
                        }
                    }
                });

                if (valid) {
                    // Move to next tab
                    let nextTab = currentTab.next('.tab-pane');
                    if (nextTab.length) {
                        let nextTabId = nextTab.attr('id');
                        $('button[data-bs-target="#' + nextTabId + '"]').tab('show');
                    } else {
                        // Last step, submit the form
                        $('#memberMultiStepForm').submit();
                    }
                }
            });

            $('.prevBtn').click(function() {
                let currentTab = $(this).closest('.tab-pane');
                let prevTab = currentTab.prev('.tab-pane');
                if (prevTab.length) {
                    let prevTabId = prevTab.attr('id');
                    $('button[data-bs-target="#' + prevTabId + '"]').tab('show');
                }
            });

            // Remove invalid class on input change
            $('input, select').on('input change', function() {
                if ($(this).val()) {
                    $(this).removeClass('is-invalid');
                }
            });

        });
    </script>
@endpush
