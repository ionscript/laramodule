@extends('application::theme.default.layouts.master')

@section('title') Home @endsection

@section('content')

    <!-- hero section start -->
    <section class="section hero-section bg-ico-hero" id="home">
        <div class="bg-overlay bg-primary"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-5 hero-title">Laravl Modules</h1>
                        <h2 class="text-white font-weight-semibold mb-3">Cloud-based phone system for your tax office</h2>
                        <p class="font-size-14">Drawing on 25 years of experience working with tax offices, we design your Front Office to meet your unique needs. We build it, set it up, and tweak it until it works just the way you want.</p>

                        <div class="button-items mt-4">
                            <a href="#" class="btn btn-success">Get started with us</a>
                            <a href="#faqs" class="btn btn-light">How it work</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-10 ml-lg-auto">
                    <div class="card overflow-hidden mb-0 mt-5 mt-lg-0">
                        <div class="card-body">
                            <div class="m-1">
                                <form method="POST" action="{{ route('account.register') }}" class="form-horizontal">
                                    @csrf
                                    <div class="form-group">
                                        <label for="user-name">{{ __('Username') }}</label>
                                        <input id="user-name" type="text" placeholder="Enter username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" autofocus>
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="user-email">{{ __('Email') }}</label>
                                        <input id="user-email" type="email" placeholder="Enter email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="user-password">{{ __('Password') }}</label>
                                        <input id="user-password" type="password" placeholder="Enter password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-lg btn-success btn-block waves-effect waves-light" type="submit">{{ __('Register') }}</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p class="mb-0">By registering you agree to the Laramodule <a href="#" class="text-primary">Terms of Use</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->

    <!-- currency price section start -->
    <section class="section bg-white p-0">
        <div class="container">
            <div class="currency-price">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar-xs mr-3">
                                            <span class="avatar-title rounded-circle bg-soft-warning text-warning font-size-18">
                                                <i class="mdi mdi-bitcoin"></i>
                                            </span>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-muted">Calls</p>
                                        <h5>$ 9134.39</h5>
                                        <p class="text-muted text-truncate mb-0">+ 0.0012.23 ( 0.2 % ) <i class="mdi mdi-arrow-up ml-1 text-success"></i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar-xs mr-3">
                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary font-size-18">
                                                <i class="mdi mdi-ethereum"></i>
                                            </span>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-muted">Sms</p>
                                        <h5>$ 245.44</h5>
                                        <p class="text-muted text-truncate mb-0">- 004.12 ( 0.1 % ) <i class="mdi mdi-arrow-down ml-1 text-danger"></i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar-xs mr-3">
                                            <span class="avatar-title rounded-circle bg-soft-info text-info font-size-18">
                                                <i class="mdi mdi-litecoin"></i>
                                            </span>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-muted">Faxes</p>
                                        <h5>$ 63.61</h5>
                                        <p class="text-muted text-truncate mb-0">+ 0.0001.12 ( 0.1 % ) <i class="mdi mdi-arrow-up ml-1 text-success"></i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- currency price section end -->

    <!-- about section start -->
    <section class="section pt-4 bg-white" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">About us</div>
                        <h4>Front office</h4>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5">

                    <div class="text-muted">
                        <h4>Best combination of features and is tailor made for your growing tax offices.</h4>
                        <p>We provides the best combination of features and is tailor made for your growing tax offices. Tax work is seasonal and every office is different, so we understand that one-size-fits-all solutions often don’t fit you.</p>
                        <p class="mb-4">Some text here</p>

                        <div class="button-items">
                            <a href="#" class="btn btn-success">Read More</a>
                            <a href="#faqs" class="btn btn-outline-primary">How It work</a>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-4 col-6">
                                <div class="mt-4">
                                    <h4>$ 43.00</h4>
                                    <p>per month per line (extensions are free)</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="mt-4">
                                    <h4>16245</h4>
                                    <p>Users</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 ml-auto">
                    <div class="mt-4 mt-lg-0">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <i class="bx bx-headphone h2 text-success"></i>
                                        </div>
                                        <h5>Call Center Features</h5>
                                        <p class="text-muted mb-0">Auto Attendant, Conference Calls, Call Queuing and more others</p>

                                    </div>
                                    <div class="card-footer bg-transparent border-top text-center">
                                        <a href="#" class="text-primary">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card border mt-lg-5">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <i class="bx bx-cloud h2 text-success"></i>
                                        </div>
                                        <h5>Cloud-based stuff</h5>
                                        <p class="text-muted mb-0">A cloud-based system has many benefits; only you can determine which are more important to you.</p>

                                    </div>
                                    <div class="card-footer bg-transparent border-top text-center">
                                        <a href="#" class="text-primary">Learn more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <hr class="my-5">

            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme clients-carousel" id="clients-carousel">
                        <div class="item">
                            <div class="client-images">
                                <img src="/assets/images/clients/1.png" alt="client-img" class="mx-auto img-fluid d-block">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-images">
                                <img src="/assets/images/clients/2.png" alt="client-img" class="mx-auto img-fluid d-block">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-images">
                                <img src="/assets/images/clients/3.png" alt="client-img" class="mx-auto img-fluid d-block">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-images">
                                <img src="/assets/images/clients/4.png" alt="client-img" class="mx-auto img-fluid d-block">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-images">
                                <img src="/assets/images/clients/5.png" alt="client-img" class="mx-auto img-fluid d-block">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-images">
                                <img src="/assets/images/clients/6.png" alt="client-img" class="mx-auto img-fluid d-block">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- about section end -->

    <!-- Features start -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Features</div>
                        <h4>Key features of the Front Office</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="mt-4 mt-md-0">
                        <div class="d-flex align-items-center mb-2">
                            <div class="features-number font-weight-semibold display-4 mr-3"><i class="bx bx-pulse"></i></div>
                            <h4 class="mb-0">Professionally Recorded Greeting</h4>
                        </div>
                        <p class="text-muted">Make a great impression with the very first call. Set the tone for a lasting relationship.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-4 mt-md-0">
                        <div class="d-flex align-items-center mb-2">
                            <div class="features-number font-weight-semibold display-4 mr-3"><i class="bx bxs-report"></i></div>
                            <h4 class="mb-0">Reports</h4>
                        </div>
                        <p class="text-muted">Get up to the minute call details, including call volume, caller details, and call durations.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-4 mt-md-0">
                        <div class="d-flex align-items-center mb-2">
                            <div class="features-number font-weight-semibold display-4 mr-3"><i class="bx bx-envelope"></i></div>
                            <h4 class="mb-0">Hold Messages</h4>
                        </div>
                        <p class="text-muted">Music or custom messages tailored for you with tax tips, IRS notifications and more.</p>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="mt-4 mt-md-0">
                        <div class="d-flex align-items-center mb-2">
                            <div class="features-number font-weight-semibold display-4 mr-3"><i class="bx bxs-microphone"></i></div>
                            <h4 class="mb-0">Call Recording</h4>
                        </div>
                        <p class="text-muted">Inbound and outbound calls can be automatically recorded, helping you eliminate Errors and Omissions claims.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-4 mt-md-0">
                        <div class="d-flex align-items-center">
                            <div class="features-number font-weight-semibold display-4 mr-3"><i class="bx bx-text"></i></div>
                            <h4 class="mb-0">Message Transcription</h4>
                        </div>
                        <p class="text-muted">English and Spanish voicemail messages can be transcribed to text and emailed to you along with the recordings with translations if needed.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-4 mt-md-0">
                        <div class="d-flex align-items-center mb-2">
                            <div class="features-number font-weight-semibold display-4 mr-3">
                                <img src="/assets/images/crypto/tax.png" alt="" class="rounded" width="120">
                            </div>
                            <h4 class="mb-0">Tax InfoLine integration</h4>
                        </div>
                        <p class="text-muted">Integrated with Tax Infoline, clients can get the current status of their federal and state tax returns and/or bank products. Support for ATX, Crosslink, Drake, Jackson Hewitt, Taxwise, uTax and more.</p>
                    </div>
                </div>

            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Features end -->

    <!-- Blog start -->
    <section class="section bg-white" id="news">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Blog</div>
                        <h4>Latest News</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-4 col-sm-6">
                    <div class="blog-box mb-4 mb-xl-0">
                        <div class="position-relative">
                            <img src="/assets/images/crypto/blog/img-1.jpg" alt="" class="rounded img-fluid mx-auto d-block">
                            <div class="badge badge-success blog-badge font-size-11">Topic</div>
                        </div>

                        <div class="mt-4 text-muted">
                            <p class="mb-2"><i class="bx bx-calendar mr-1"></i> 04 Mar, 2020</p>
                            <h5 class="mb-3">Donec pede justo, fringilla vele</h5>
                            <p>If several languages coalesce, the grammar of the resulting language</p>

                            <div>
                                <a href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6">
                    <div class="blog-box mb-4 mb-xl-0">

                        <div class="position-relative">
                            <img src="/assets/images/crypto/blog/img-2.jpg" alt="" class="rounded img-fluid mx-auto d-block">
                            <div class="badge badge-success blog-badge font-size-11">Topic</div>
                        </div>

                        <div class="mt-4 text-muted">
                            <p class="mb-2"><i class="bx bx-calendar mr-1"></i> 12 Feb, 2020</p>
                            <h5 class="mb-3">Aenean ut eros et nisl</h5>
                            <p>Everyone realizes why a new common language would be desirable</p>

                            <div>
                                <a href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6">
                    <div class="blog-box mb-4 mb-xl-0">
                        <div class="position-relative">
                            <img src="/assets/images/crypto/blog/img-3.jpg" alt="" class="rounded img-fluid mx-auto d-block">
                            <div class="badge badge-success blog-badge font-size-11">Topic</div>
                        </div>

                        <div class="mt-4 text-muted">
                            <p class="mb-2"><i class="bx bx-calendar mr-1"></i> 06 Jan, 2020</p>
                            <h5 class="mb-3">In turpis, pellentesque posuere</h5>
                            <p>To an English person, it will seem like simplified English, as a skeptical Cambridge</p>

                            <div>
                                <a href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Blog end -->

    <!-- Faqs start -->
    <section class="section" id="faqs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">FAQs</div>
                        <h4>Frequently asked questions</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="vertical-nav">
                        <div class="row">
                            <div class="col-lg-2 col-sm-4">
                                <div class="nav flex-column nav-pills" role="tablist">
                                    <a class="nav-link active" id="v-pills-gen-works-tab" data-toggle="pill" href="#v-pills-gen-works" role="tab">
                                        <i class= "bx bx-help-circle nav-icon d-block mb-2"></i>
                                        <p class="font-weight-bold mb-0">What do I have to do?</p>
                                    </a>

                                    <a class="nav-link" id="v-pills-gen-todo-tab" data-toggle="pill" href="#v-pills-gen-todo" role="tab">
                                        <i class= "bx bx-wrench nav-icon d-block mb-2"></i>
                                        <p class="font-weight-bold mb-0">How does Front Office work?</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-10 col-sm-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="v-pills-gen-works" role="tabpanel">
                                                <h4 class="card-title mb-4">How does Front Office work?</h4>

                                                <div>
                                                    <div id="gen-ques-accordion" class="accordion custom-accordion">
                                                        <div class="mb-3">
                                                            <a href="#general-collapseOne" class="accordion-list" data-toggle="collapse"
                                                               aria-expanded="true"
                                                               aria-controls="general-collapseOne">

                                                                <div>All my clients know my phone number. Can I keep my current number(s)?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>

                                                            </a>

                                                            <div id="general-collapseOne" class="collapse show" data-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">Of course, you can, it’s your number. It was assigned to you and is yours until you choose to discontinue it. With Front Office, you can use your number from, or to anywhere in the United States. We can set it up any way you want. Even toll-free numbers can be used with Front Office.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapseTwo" class="accordion-list collapsed" data-toggle="collapse"
                                                               aria-expanded="false"
                                                               aria-controls="general-collapseTwo">
                                                                <div>What about numbers from other cities or states?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapseTwo" class="collapse" data-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">With Front Office you can have phone numbers from any location within the USA. For instance, you might want a number from nearby areas or larger cities, or even from another state.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapseThree" class="accordion-list collapsed" data-toggle="collapse"
                                                               aria-expanded="false"
                                                               aria-controls="general-collapseThree">
                                                                <div>What about different locations, or workers who are traveling. Do I need different numbers?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapseThree" class="collapse" data-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">No additional numbers are needed. You can use just one phone number (if you want) for multiple locations. Just let us know so your Front Office can be configured the way you want it to work. With Front Office, you can make or receive virtually unlimited simultaneous calls and your main number will always show.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapseFour" class="accordion-list collapsed" data-toggle="collapse"
                                                               aria-expanded="false"
                                                               aria-controls="general-collapseFour">
                                                                <div>What kind of support do you offer?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapseFour" class="collapse" data-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">We promise to never abandon you to an unfeeling paper instruction manual. We provide a variety of post-installation support. Clients are welcome to contact our support personnel via email, chat, or phone. We also provide a handy “how to” guide in which most questions are addressed. And if that doesn’t help we have real live technicians ready to travel.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapseFour" class="accordion-list collapsed" data-toggle="collapse"
                                                               aria-expanded="false"
                                                               aria-controls="general-collapseFour">
                                                                <div>Sounds good, especially the price, but ... what about taxes, fees, free phones?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapseFour" class="collapse" data-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">Trust us, you don’t want free phones. They are generally worth exactly what you paid for them. We use only the highest-rated equipment which we sell to you at cost. And Versicom’s flat-rate service includes all relevant charges, taxes, and fees. We lay it all out, so you know exactly what you are paying for. We want you happy with your properly functioning Front Office system.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapseFour" class="accordion-list collapsed" data-toggle="collapse"
                                                               aria-expanded="false"
                                                               aria-controls="general-collapseFour">
                                                                <div>How many phone lines does the Front Office system include?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapseFour" class="collapse" data-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">As many as you purchase. There is no charge for extensions. This makes Front Office an ideal system whether you have a small office with just one or two lines, or a large firm with multiple lines. Large or small, you have recognized that you need a more advanced communication system, which may include auto-attendant answering.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-gen-todo" role="tabpanel">
                                                <h4 class="card-title mb-4">Exactly how will Front Office work & what do I have to do?</h4>

                                                <div>
                                                    <div id="gen-ques-accordion" class="accordion custom-accordion">
                                                        <div class="mb-3">
                                                            <a href="#general-collapseOne" class="accordion-list" data-toggle="collapse"
                                                               aria-expanded="true"
                                                               aria-controls="general-collapseOne">

                                                                <div>What features are included with Front Office?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>

                                                            </a>

                                                            <div id="general-collapseOne" class="collapse show" data-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0"><i class="mdi mdi-circle-medium text-success mr-1"></i>Customer Relations Management (CRM)</p>
                                                                    <p class="mb-0"><i class="mdi mdi-circle-medium text-success mr-1"></i>Message Transcription</p>
                                                                    <p class="mb-0"><i class="mdi mdi-circle-medium text-success mr-1"></i>Tax Infoline integration</p>
                                                                    <p class="mb-0"><i class="mdi mdi-circle-medium text-success mr-1"></i>Auto attendant</p>
                                                                    <p class="mb-0"><i class="mdi mdi-circle-medium text-success mr-1"></i>Advanced Call Recording and Monitoring</p>
                                                                    <p class="mb-0"><i class="mdi mdi-circle-medium text-success mr-1"></i>Graphical Dashboard</p>
                                                                    <p class="mb-0"><i class="mdi mdi-circle-medium text-success mr-1"></i>Customizable Music or Messaging when on Hold</p>
                                                                    <p class="mb-0"><i class="mdi mdi-circle-medium text-success mr-1"></i>… and many more.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapseTwo" class="accordion-list collapsed" data-toggle="collapse"
                                                               aria-expanded="false"
                                                               aria-controls="general-collapseTwo">
                                                                <div>Will I need to rewire my office to use Front Office?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapseTwo" class="collapse" data-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">Not likely as the new system only requires a CAT5 jack. If you already have an internet-enabled computer where the new phone is installed, no additional wiring is necessary. If you want a phone where there is no internet connection, you might need to install a wire to connect.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapseThree" class="accordion-list collapsed" data-toggle="collapse"
                                                               aria-expanded="false"
                                                               aria-controls="general-collapseThree">
                                                                <div>So, I need a computer to make this work?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapseThree" class="collapse" data-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">No, you need an internet connection but not a computer, as the phones are independent of any other internet-dependant devices.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapseFour" class="accordion-list collapsed" data-toggle="collapse"
                                                               aria-expanded="false"
                                                               aria-controls="general-collapseFour">
                                                                <div>What kind of support do you offer?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapseFour" class="collapse" data-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">We promise to never abandon you to an unfeeling paper instruction manual. We provide a variety of post-installation support. Clients are welcome to contact our support personnel via email, chat, or phone. We also provide a handy “how to” guide in which most questions are addressed. And if that doesn’t help we have real live technicians ready to travel.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapseFour" class="accordion-list collapsed" data-toggle="collapse"
                                                               aria-expanded="false"
                                                               aria-controls="general-collapseFour">
                                                                <div>OK, I think I understand. I’m ready to convert to Front Office. I’ll just cancel my current service and ....</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapseFour" class="collapse" data-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">NO! Please don’t do that! Just call us, Versicom Communications will handle the conversion to the new system. We know it may sound funny, but some things just need to happen in a certain order. Generally, the conversion takes 2-3 weeks. If you cancel your current service too soon it just might take a lot longer to complete the installation. Relax, we will take care of it.</p>
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
                        </div>
                    </div>
                    <!-- end vertical nav -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Faqs end -->

@endsection