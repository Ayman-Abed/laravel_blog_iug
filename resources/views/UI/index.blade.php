@extends('UI.layout')
@section('title-page')
    Home
@endsection
@section('content')


    <div class="site-section py-0">
        <div class="owl-carousel hero-slide owl-style">
            @foreach ($sliders as $slider)

                <div class="site-section">
                    <div class="container">
                        <div class="half-post-entry d-block d-lg-flex bg-light">
                            <div class="img-bg" style="background-image: url({{ $slider->image }})"></div>
                            <div class="contents">
                                <span class="caption text-success">{{ $slider->category->name }}</span>
                                <h2>
                                    <a href="{{ route('UI.showPost',['id' => $slider->id,'slug' => $slider->slug]) }}">{{ $slider->title }}</a>
                                </h2>
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
                        .img-fluid {
                            max-width: 100%;
                            height: 250px;
                        }
                    </style>
                    <div class="row">
                        @if (isset($first_post))

                            <div class="col-md-6">
                                <div class="post-entry-1">
                                    <a href="{{ route('UI.showPost',['id' => $first_post->id,'slug' => $first_post->slug]) }}">
                                        <img src="{{ $first_post->image }}" alt="Image" class="img-fluid"></a>
                                    <h2>
                                        <a href="{{ route('UI.showPost',['id' => $first_post->id,'slug' => $first_post->slug]) }}">{{ $first_post->title }}</a>
                                    </h2>
                                    <p>{!! Str::limit($first_post->content, 400) !!}</p>
                                    <div class="post-meta">

                                        <span class="date-read">{{ $first_post->created_at->toFormattedDateString() }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <div class="col-md-6">
                            @foreach ($posts->where('id','!=',$first_post->id)->take(4) as $post)

                                <div class="post-entry-2 d-flex bg-light">
                                    <div class="thumbnail" style="background-image: url({{ $post->image }})"></div>
                                    <div class="contents">
                                        <h2>
                                            <a href="{{ route('UI.showPost',['id' => $post->id,'slug' => $post->slug]) }}">{{ $post->title }}</a>
                                        </h2>
                                        <div class="post-meta">
                                            <span
                                                class="date-read">{{ $first_post->created_at->toFormattedDateString() }}</span>
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
                                <h2>
                                    <a href="{{ route('UI.showPost',['id' => $post->id,'slug' => $post->slug]) }}">{{ $post->title }}</a>
                                </h2>
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
                                <h2>
                                    <a href="{{ route('UI.showCategory',['id' => $categories_post->id,'slug' =>  $categories_post->slug]) }}">
                                         {{ $categories_post->name }}</h2>
                                    </a>
                            </div>
                            @foreach ($categories_post->posts as $cat_post)
                                <div class="post-entry-2 d-flex">
                                    <div class="thumbnail" style="background-image: url({{ $cat_post->image }})"></div>
                                    <div class="contents">
                                        <h2>
                                            <a href="{{ route('UI.showPost',['id' => $cat_post->id,'slug' => $cat_post->slug]) }}">{{ $cat_post->title }}</a>
                                        </h2>
                                        <p class="mb-3">{!! Str::limit($first_post->content, 400) !!}</p>
                                        <div class="post-meta">
                                            <span
                                                class="date-read">{{ $cat_post->created_at->toFormattedDateString() }}</span>
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

@endsection
