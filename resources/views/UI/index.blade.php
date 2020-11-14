<!DOCTYPE html>
<html lang="en">

<head>

    @php
        $setting = App\Setting::first();
    @endphp
    @if (isset($setting))

    <title>{{ $setting->blog_name }}</title>
    @endif
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('UI/fonts/icomoon/style.css') }}">

  <link rel="stylesheet" href="{{ asset('UI/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('UI/css/jquery-ui.css') }}">
  <link rel="stylesheet" href="{{ asset('UI/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('UI/css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('UI/css/owl.theme.default.min.css') }}">

  <link rel="stylesheet" href="{{ asset('UI/css/jquery.fancybox.min.css') }}">

  <link rel="stylesheet" href="{{ asset('UI/css/bootstrap-datepicker.css') }}">

  <link rel="stylesheet" href="{{ asset('UI/fonts/flaticon/font/flaticon.css') }}">

  <link rel="stylesheet" href="{{ asset('UI/css/aos.css') }}">
  <link href="{{ asset('UI/css/jquery.mb.YTPlayer.min.css') }}" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="{{ asset('UI/css/style.css') }}">

  <style>
    .badge-dark {
        color: #fff;
        background-color: #343a40;
        padding-left: 13px;
        padding-right: 13px;
        padding-top: 5px;
        padding-bottom: 5px;
    }
  </style>


</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>



    <div class="header-top">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-lg-6 d-flex">
            <a href="index.html" class="site-logo">
              @if (isset($setting))
                {{ $setting->blog_name }}
              @endif
            </a>

            <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>

          </div>
          <div class="col-12 col-lg-6 ml-auto d-flex">
            <div class="ml-md-auto top-social d-none d-lg-inline-block">
                @if (isset($setting))

                <a href="{{ $setting->facebook }}" class="d-inline-block p-3"><span class="icon-facebook"></span></a>
                <a href="{{ $setting->twitter }}" class="d-inline-block p-3"><span class="icon-twitter"></span></a>
                <a href="{{ $setting->instagram }}" class="d-inline-block p-3"><span class="icon-instagram"></span></a>
                @endif

            </div>
            <form action="#" class="search-form d-inline-block">

              <div class="d-flex">
                <input type="email" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-secondary" ><span class="icon-search"></span></button>
              </div>
            </form>


          </div>
          <div class="col-6 d-block d-lg-none text-right">

          </div>
        </div>
      </div>




      <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">

          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                <li class="active">
                  <a href="{{ route('UI.index') }}" class="nav-link text-left">Home</a>
                </li>
                @foreach ($categories as $categoy)
                    <li>
                        <a href="{{ route('UI.showCategory',['id' => $categoy->id,'slug' =>  $categoy->slug]) }}"
                            class="nav-link text-left">{{ $categoy->name }}</a>
                    </li>
                @endforeach

                <li><a href="contact.html" class="nav-link text-left">Contact</a></li>
              </ul>
            </nav>

          </div>

        </div>
      </div>

    </div>

    </div>

    <div class="site-section py-0">
      <div class="owl-carousel hero-slide owl-style">
        @foreach ($sliders as $slider)

            <div class="site-section">
            <div class="container">
                <div class="half-post-entry d-block d-lg-flex bg-light">
                <div class="img-bg" style="background-image: url({{ $slider->image }})"></div>
                <div class="contents">
                    <span class="caption text-success">{{ $slider->category->name }}</span>
                    <h2><a href="{{ route('UI.showPost',['id' => $slider->id,'slug' => $slider->slug]) }}">{{ $slider->title }}</a></h2>
                    <p class="mb-3">{!! Str::limit( $slider->content,1200) !!}</p>

                    <div class="post-meta">
                    @foreach ($slider->tags as $slider_post)
                        <span class="badge badge-pill badge-dark">{{ $slider_post->name }}</span>
                    @endforeach
                    <br>
                    <span class="date-read">{{ $slider->created_at->toFormattedDateString() }} </span>
                    </div>

                </div>
                </div>
            </div>
            </div>

        @endforeach


      </div>
    </div>


    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="row">
              <div class="col-12">
                <div class="section-title">
                  <h2>Latest Posts</h2>
                </div>
              </div>
            </div>
            <style>
                .img-fluid{
                    max-width: 100%;
                    height: 250px;
                }
            </style>
            <div class="row">
                @if (isset($first_post))

                    <div class="col-md-6">
                        <div class="post-entry-1">
                        <a href="{{ route('UI.showPost',['id' => $first_post->id,'slug' => $first_post->slug]) }}">
                            <img src="{{ $first_post->image }}"  alt="Image" class="img-fluid" ></a>
                        <h2><a href="{{ route('UI.showPost',['id' => $first_post->id,'slug' => $first_post->slug]) }}">{{ $first_post->title }}</a></h2>
                        <p>{!! Str::limit($first_post->content, 400) !!}</p>
                        <div class="post-meta">

                            <span class="date-read">{{ $first_post->created_at->toFormattedDateString() }}
                                </span>
                        </div>
                        </div>
                    </div>
                @endif


              <div class="col-md-6">
                @foreach ($posts->where('id','!=',$first_post->id)->take(4) as $post)

                    <div class="post-entry-2 d-flex bg-light">
                    <div class="thumbnail" style="background-image: url({{ $post->image }})"></div>
                    <div class="contents">
                        <h2><a href="{{ route('UI.showPost',['id' => $post->id,'slug' => $post->slug]) }}">{{ $post->title }}</a></h2>
                        <div class="post-meta">
                            <span class="date-read">{{ $first_post->created_at->toFormattedDateString() }}</span>
                        </div>
                    </div>
                    </div>
                @endforeach
              </div>
            </div>
          </div>


          <div class="col-lg-4">
            <div class="section-title">
              <h2>Trending</h2>
            </div>
            @foreach ($posts->take(4) as $key =>  $post)
                <div class="trend-entry d-flex">
                    <div class="number align-self-start">0{{ $key+1 }}</div>
                    <div class="trend-contents">
                        <h2><a href="{{ route('UI.showPost',['id' => $post->id,'slug' => $post->slug]) }}">{{ $post->title }}</a></h2>
                        <div class="post-meta">
                        <span class="date-read">{{ $post->created_at->toFormattedDateString() }}</span>
                        </div>
                    </div>
                </div>
            @endforeach



          </div>
        </div>
      </div>
    </div>
    <!-- END section -->

    <div class="site-section">
      <div class="container">
        <div class="row">

            @foreach ($categories_posts as $categories_post)
                @if ($categories_post->posts->count() > 0)
                    <div class="col-lg-6">
                        <div class="section-title">
                            <h2>{{ $categories_post->name }}</h2>
                        </div>
                        @foreach ($categories_post->posts as $cat_post)
                            <div class="post-entry-2 d-flex">
                                <div class="thumbnail" style="background-image: url({{ $cat_post->image }})"></div>
                                <div class="contents">
                                    <h2><a href="{{ route('UI.showPost',['id' => $cat_post->id,'slug' => $cat_post->slug]) }}">{{ $cat_post->title }}</a></h2>
                                    <p class="mb-3">{!! Str::limit($first_post->content, 400) !!}</p>
                                    <div class="post-meta">
                                        <span class="date-read">{{ $cat_post->created_at->toFormattedDateString() }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
      </div>
    </div>






    <div class="footer">
      <div class="container">

        @if (isset($setting))

            <div class="row">
            <div class="col-12">
                <div class="copyright">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        حقوق الطبع والنشر محفوظة لدى  {{ $setting->blog_name }} &copy; <script>document.write(new Date().getFullYear()); </script> </a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                </div>
            </div>
            </div>
        @endif

      </div>
    </div>


  </div>
  <!-- .site-wrap -->


  <!-- loader -->
  <div id="loader" class="show fullscreen">
      <svg class="circular" width="48px" height="48px">
          <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15"/></svg></div>

  <script src="{{ asset('UI/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('UI/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('UI/js/jquery-ui.js') }}"></script>
  <script src="{{ asset('UI/js/popper.min.js') }}"></script>
  <script src="{{ asset('UI/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('UI/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('UI/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('UI/js/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('UI/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('UI/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('UI/js/aos.js') }}"></script>
  <script src="{{ asset('UI/js/jquery.fancybox.min.js') }}"></script>
  <script src="{{ asset('UI/js/jquery.sticky.js') }}"></script>
  <script src="{{ asset('UI/js/jquery.mb.YTPlayer.min.js') }}"></script>




  <script src="{{ asset('UI/js/main.js') }}"></script>

</body>

</html>
