@extends('UI.layout')
@section('content')
@section('title-page')
  Search
@endsection


@if (isset($post))
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 >Search Result ( {{ $post->count() }} ) : <span class="text-success"> {{ $search }}</span></h2>
                    </div>

                    @if ($post->count() > 0)
                        @foreach ($post as $cat_post)
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
                                No Posts Found
                            </div>
                        </div>
                    @endif

                </div>

            </div>


        </div>
    </div>
@endif

@endsection
