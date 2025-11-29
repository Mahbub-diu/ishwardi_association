@extends('layouts.app-frontend')




@section('content')
    <section class="common-banner-main"
        data-background="{{ asset('public/front-end/img/new-home/dashboard/common-banner.webp') }}">

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="common-banner-text">
                        <h2>Buy Membership</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">User Profile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Buy Membership</li>
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
                                <legend class="rounded">Buy Membership</legend>

                                <form action="" id="buyMembership">

                                    <!-- STEP 1 -->
                                    <div class="buy-member-step-1">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <label for="membership_category" class="form-label">Membership
                                                        category *</label>
                                                    <select class="form-select" name="membership_category" required>
                                                        <option value="" selected>Select Membership category
                                                        </option>
                                                        <option value="1">Gold</option>
                                                        <option value="2">Platinum</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <label for="membership_price" class="form-label">Membership
                                                        Price</label>
                                                    <input type="text" class="form-control" id="membership_price"
                                                        name="membership_price" disabled value="100">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="terms"
                                                        name="terms" required>
                                                    <label class="form-check-label" for="terms">
                                                        I have read and agree to the <a href="#" target="_blank">Terms
                                                            and Conditions</a>.
                                                    </label>
                                                    <div class="invalid-feedback">You must agree before continuing.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="update-profile-btn">
                                                    <button type="button" class="btn as-btn nextBtn">make
                                                        payment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- STEP 2 -->
                                    <div class="buy-member-step-2 d-none">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-9 col-lg-9">
                                                <div class="form-group">
                                                    <label class="form-label">Select payment method *</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                        <label class="form-check-label" for="inlineRadio1">ssl
                                                            commerze</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                        <label class="form-check-label" for="inlineRadio2">bkas</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                        <label class="form-check-label" for="inlineRadio3">Nagad</label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-3 col-lg-3">
                                                <div class="payment-lists">
                                                    <div class="list-flex"><span class="text">Sub-Total</span><span
                                                            class="amount">100</span></div>
                                                    <div class="list-flex"><span class="text">Online
                                                            charge</span><span class="amount">100</span></div>
                                                    <div class="list-flex"><span class="text">Total</span><span
                                                            class="amount">100</span></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <div class="update-profile-btn">
                                                    <button type="button" class="btn as-btn nextBtn">pay now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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

            // STEP 1 → NEXT
            $(".buy-member-step-1 .nextBtn").click(function() {

                let valid = true;
                let category = $("select[name='membership_category']");
                let terms = $("#terms");

                category.removeClass("is-invalid");
                terms.removeClass("is-invalid");

                // validate category
                if (category.val() === "" || category.val() === null) {
                    category.addClass("is-invalid");
                    valid = false;
                }

                // validate terms checkbox
                if (!terms.is(":checked")) {
                    terms.addClass("is-invalid");
                    valid = false;
                }

                if (!valid) return;

                // Go to Step 2
                $(".buy-member-step-1").addClass("d-none");
                $(".buy-member-step-2").removeClass("d-none");
            });

            // STEP 2 → PAY NOW
            $(".buy-member-step-2 .nextBtn").click(function() {

                let payment = $("input[name='payment_method']:checked");
                $("input[name='payment_method']").removeClass("is-invalid");

                if (payment.length === 0) {
                    $("input[name='payment_method']").addClass("is-invalid");
                    return;
                }

                // Success → Submit form
                $("#buyMembership").submit();
            });

        });
    </script>
@endpush
