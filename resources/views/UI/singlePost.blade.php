@extends('UI.layout')
@section('title-page')
    @if (isset($post))
        {{ $post->title }}
    @endif
@endsection
@section('content')

    <div class="site-section">
        <div class="container">
            <div class="row">
                @if (isset($post))
                    <div class="col-lg-8 single-content">

                        <p class="mb-5">
                            <img src="{{ $post->image }}" alt="Image" class="img-fluid">
                        </p>
                        <h1 class="mb-4">
                            {{ $post->title }}
                        </h1>
                        <div class="post-meta d-flex mb-5">
                            <div class="vcard">
                                <span class="d-block text-success">{{ $post->category->name }}</span>
                            </div>
                        </div>

                        <p>{!! $post->content !!}</p>


                        <div class="pt-5">
                            <p>Tags :
                                @foreach ($post->tags as $post_tag)
                                    <span class="badge badge-dark">{{ $post_tag->name }}</span>
                                @endforeach
                            </p>
                        </div>


                    </div>
                @endif


                <div class="col-lg-3 ml-auto">
                    <div class="section-title">
                        <h2>Latest Posts</h2>
                    </div>


                    @foreach ($latest_posts as $key =>  $latest_post)

                        <div class="trend-entry d-flex">
                            <div class="number align-self-start">0{{ $key+1 }}</div>
                            <div class="trend-contents">
                                <h2>
                                    <a href="{{ route('UI.showPost',['id' => $latest_post->id,'slug' => $latest_post->slug]) }}">{{ $latest_post->title }}</a>
                                </h2>
                                <div class="post-meta">
                                    <span
                                        class="date-read">{{ $latest_post->created_at->toFormattedDateString() }} </span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>


            </div>

        </div>
    </div>

@endsection

