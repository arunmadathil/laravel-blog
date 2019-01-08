@extends('website/app')

@section('bg-img',Storage::disk('local')->url($post->image))
@section('head')

@endsection
@section('title',$post->title)
@section('sub-heading',$post->subtitle)

@section('content')
<!-- Post Content -->
<div id="fb-root"></div>

<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <small>Created at <?php $date = \Carbon\Carbon::parse($post->created_at, 'UTC'); echo $date->format('M d Y');?></small>
                @foreach ($post->categories as $category)
                <small class="pull-right" style="margin-right: 20px">  
                    <a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>
                </small>
                @endforeach
                {!! htmlspecialchars_decode($post->body) !!}

                {{-- Tag clouds --}}
                <h3>Tag Clouds</h3>
                @foreach ($post->tags as $tag)
                <a href="{{ route('tag',$tag->slug) }}"><small class="pull-left" style="margin-right: 20px;border-radius: 5px;border: 1px solid gray;padding: 5px;">  
                                    {{ $tag->name }}
                                </small></a>
                @endforeach
            </div>
           
        </div>
    </div>
</article>

<hr>
@endsection
@section('footer')
<script src="{{ asset('user/js/prism.js') }}"></script>
@endsection