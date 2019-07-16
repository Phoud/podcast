@extends('home.common.main')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/home/styles/contact.css">
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/home/styles/contact_responsive.css">
@endsection
@section('content')

<div class="home">
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ url('/') }}/home/images/contact.jpg" data-speed="0.8"></div>
    <div class="home_container d-flex flex-column align-items-center justify-content-center">
        <div class="home_content">
            <div class="home_title"><h2 class="blog-title">{{ $read->title }}</h2></div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="image single-blog-container">
                <img src="{{ url('/') }}/admins/blog/{{ $read->image }}" alt="">
            </div>
            <div class="blog-description">{!! $read->body !!}</div>
                <div class="container">
                <div class="row mt-35">
                    <div class="col-md-6 col-6">
                        <div class="sharing">
                            <p class="pull-right">ແບ່ງປັນ</p>
                          </div>
                    </div>
                    <div class="col-md-6 col-6 pull-left">
                        
                            <a href="#" class="fb">
                                <i class="fa fa-facebook-square"></i>
                              </a>
                      
                    </div>
                </div>
            </div>
                <hr>
                <p class="text-center related-post">ຂ່າວສານອື່ນໆທີ່ໜ້າສົນໃຈ</p>
                <div class="row mt-20 mb-20">
                    @foreach($blogs as $blog)
                        <div class="col-md-6 mt-3">
                            <div class="card">
                                <a href="{{ route('read', $blog->id) }}">
                                <img class="card-img-top" src="{{ url('/') }}/admins/blog/{{ $blog->image }}" alt="Card image cap">
                                <div class="card-body">
                                  <p class="related-blog-title">{{ $blog->title }}</p>
                                  <div class="mt-20">
                                        {{ $blog->created_at->format('d M Y') }}
                                      </div>
                                </div>
                                </a>
                                  
                                </div>
                              </div>
                    @endforeach
                        </div>
                </div>
            </div>
    </div>
</div>


    
@endsection
@section('js')
<script src="{{ url('/') }}/home/js/contact.js"></script>
@endsection