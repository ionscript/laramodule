<!-- Footer start -->
<footer class="landing-footer">
    <div class="container">

        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="mb-4 mb-lg-0">
                    <h5 class="mb-3 footer-list-title">Company</h5>
                    <ul class="list-unstyled footer-list-menu">
                        @foreach($pages['bottom'] as $page)
                            @if($page->column_order === 1)
                            <li><a href="{{ route('app.page', ['id' => $page->id]) }}">{{ $page->title }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="mb-4 mb-lg-0">
                    <h5 class="mb-3 footer-list-title">Resources</h5>
                    <ul class="list-unstyled footer-list-menu">
                        @foreach($pages['bottom'] as $page)
                            @if($page->column_order === 2)
                                <li><a href="{{ route('app.page', ['id' => $page->id]) }}">{{ $page->title }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="mb-4 mb-lg-0">
                    <h5 class="mb-3 footer-list-title">Links</h5>
                    <ul class="list-unstyled footer-list-menu">
                        <ul class="list-unstyled footer-list-menu">
                            @foreach($pages['bottom'] as $page)
                                @if($page->column_order === 3)
                                    <li><a href="{{ route('app.page', ['id' => $page->id]) }}">{{ $page->title }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="mb-4 mb-lg-0">
                    <h5 class="mb-3 footer-list-title">Latest News</h5>
                    <div class="blog-post">
                        <a href="#" class="post">
                            <div class="badge badge-soft-success font-size-11 mb-3">Topic</div>
                            <h5 class="post-title">Donec pede justo aliquet nec</h5>
                            <p class="mb-0"><i class="bx bx-calendar mr-1"></i> 04 Mar, 2020</p>
                        </a>
                        <a href="#" class="post">
                            <div class="badge badge-soft-success font-size-11 mb-3">Topic</div>
                            <h5 class="post-title">In turpis, Pellentesque</h5>
                            <p class="mb-0"><i class="bx bx-calendar mr-1"></i> 12 Mar, 2020</p>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <hr class="footer-border my-5">

        <div class="row">
            <div class="col-lg-6">
                <div class="mb-4">
                    <span class="h5 logo logo-light"><i class="bx bx-analyse text-primary"></i> <span class="text-dark">Laramodule</span></span>
                    <span class="h5 logo logo-dark"><i class="bx bx-analyse text-primary"></i> <span class="text-white">Laramodule</span></span>
                </div>
                <p class="mb-2">2020 © All Rights reserved</p>
            </div>

        </div>
    </div>
    <!-- end container -->
</footer>
<!-- Footer end -->