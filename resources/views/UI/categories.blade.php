@extends('UI.layout')
@section('content')
@section('title-page')
    @if (isset($category))
        {{ $category->name }}
    @endif
@endsection


@if (isset($category))
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span class="caption d-block small">Categories</span>
                        <br>
                        <h2>{{ $category->name }}</h2>
                    </div>

                    @if ($category->posts->count() > 0)
                        @foreach ($category->posts as $cat_post)
                            <div class="post-entry-2 d-flex">
                                <div class="thumbnail order-md-2"
                                     style="background-image: url({{ $cat_post->image }})"></div>
                                <div class="contents order-md-1 pl-0">
                                    <h2>
                                        <a href="{{ route('UI.showPost',['id' => $cat_post->id,'slug' => $cat_post->slug]) }}">{{ $cat_post->title }}</a>
                                    </h2>
                                    <p class="mb-3">{!! Str::limit($cat_post->content, 600) !!}</p>
                                    <div class="post-meta">
                                        @foreach ($cat_post->tags as $cat_post_tag)
                                            <span
                                                class="badge badge-pill badge-dark">{{ $cat_post_tag->name }}</span>
                                        @endforeach
                                        <br>
                                        <br>
                                        <span
                                            class="date-read">{{ $cat_post->created_at->toFormattedDateString() }} </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @else
                        <div class="post-entry-2 d-block">
                            <div class="alert alert-danger text-center" role="alert">
                                The Category is Empty
                            </div>
                        </div>
                    @endif

                </div>

            </div>


        </div>
    </div>
@endif

@endsection
