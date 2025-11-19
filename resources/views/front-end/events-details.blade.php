@extends('layouts.app-frontend')

@section('content')
    <section class="contact-banner-main"
        style="background: url('{{ asset('public/front-end/img/mahbub/inner_02.jpg') }}');background-size: cover;background-repeat: no-repeat;background-position: center center;">
        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="about-content-box">
                        <h3>Spain Education Seminar</h3>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="events-details-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="events-card">
                        <div class="image-box">
                            <img src="{{ asset('public/front-end/img/events/event-10-1130x650.webp') }}" alt=""
                                class="img-fluid">
                        </div>
                        <div class="events-description">
                            <p>Looking to learn more about the Spanish education system? Then look no further than the Spain
                                Education Seminar! This exciting event offers a comprehensive overview of the education
                                system in Spain, with insights from top experts in the field. At the Spain Education
                                Seminar, you’ll have the opportunity to learn about the history, structure, and current
                                state of education in Spain. You’ll discover the unique characteristics of the Spanish
                                education system, including the focus on language learning, the importance of vocational
                                education, and the role of technology in the classroom.</p>
                            <p>Throughout the event, you’ll hear from a variety of speakers, including educators,
                                policymakers, and researchers. They’ll share their insights on topics such as teacher
                                training, curriculum design, and assessment strategies, providing you with a broad
                                understanding of the issues facing education in Spain today. But the Spain Education Seminar
                                is more than just a series of lectures – it’s also a chance to network and connect with
                                others in the education community. You’ll have the opportunity to meet fellow educators,
                                policymakers, and researchers, and to share your own experiences.</p>
                            <p>Whether you’re a teacher, a researcher, a policymaker, or simply someone interested in
                                education, the Spain Education Seminar is the perfect event for you. With its in-depth
                                discussions, expert speakers, and opportunities for networking, it’s sure to provide you
                                with valuable insights and connections that will help you in your work. Don’t miss out –
                                register today and join us for this exciting event!</p>

                            <div class="events-tags">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">business</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">conference</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">events</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">hotel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">meetup</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">events</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="events-share">
                                <h4>Share This Event</h4>
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa-brands fa-youtube"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa-brands fa-instagram"></i></a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="events-tabs-main">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="speaker-tab" data-bs-toggle="tab"
                                    data-bs-target="#speaker-tab-pane" type="button" role="tab"
                                    aria-controls="speaker-tab-pane" aria-selected="true">speakers</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="schedule-tab" data-bs-toggle="tab"
                                    data-bs-target="#schedule-tab-pane" type="button" role="tab"
                                    aria-controls="schedule-tab-pane" aria-selected="false">schedule</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#contact-tab-pane" type="button" role="tab"
                                    aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="speaker-tab-pane" role="tabpanel"
                                aria-labelledby="speaker-tab" tabindex="0">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque perferendis perspiciatis
                                obcaecati adipisci pariatur, repudiandae dicta recusandae vero ab illum eligendi possimus
                                magni nisi a unde. Consequuntur quam ipsum dolores.
                            </div>
                            <div class="tab-pane fade" id="schedule-tab-pane" role="tabpanel" aria-labelledby="schedule-tab"
                                tabindex="0">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque perferendis perspiciatis
                                obcaecati adipisci pariatur, repudiandae dicta recusandae vero ab illum eligendi possimus
                                magni nisi a unde. Consequuntur quam ipsum dolores.
                            </div>
                            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel"
                                aria-labelledby="contact-tab" tabindex="0">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque perferendis perspiciatis
                                obcaecati adipisci pariatur, repudiandae dicta recusandae vero ab illum eligendi possimus
                                magni nisi a unde. Consequuntur quam ipsum dolores.
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta corporis dignissimos commodi similique!
                    Aliquam, corrupti, laborum dolor ducimus tempore vitae veniam, impedit qui repellat at facilis sed
                    adipisci consectetur ad?
                </div>
            </div>
        </div>
    </section>
@endsection
