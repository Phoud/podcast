{{-- <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2018 Concept. All rights reserved. Dashboard by <a>Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

    <script src="{{ url('/') }}/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="{{ url('/') }}/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        var baseUrl = '{{ url('/') }}';
    </script>
    <script src="{{ asset('/tiny/jquery.tinymce.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/tiny/tinymce.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/tiny/tinymce.setting.js')}}" type="text/javascript"></script>
    @yield('js')