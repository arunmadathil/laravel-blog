@extends('website/app')

@section('bg-img',asset('website/img/home-bg.jpg'))
@section('title','Laravel Blog')
@section('sub-heading','Learn Together and Grow Together')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
	 <link rel="icon" href="@if(Config::get('settings.general.logo')) {{Config::get('settings.general.logo')}} @endif" type="image/png">
@endsection
@section('content')
	<!-- Main Content -->
	<div class="container">
	    <div class="row" id="app">
	        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	        @foreach($posts as $post)
	        	<div class="post-preview">
            <a href="{{ route('post',$post->id) }}">
              <h2 class="post-title">
               {{ $post->title }}
              </h2>
              <hr>
              <h3 class="post-subtitle">
                 {{ $post->subtitle }}
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#">{{ $post->user->profile->name }}</a>
              on <?php $date = \Carbon\Carbon::parse($post->created_at, 'UTC'); echo $date->format('M d Y');?></p>
          </div>
          <hr>
	        @endforeach
	            
	            <!-- Pager -->
	            <ul class="pager">
	                <li class="next">
	                	{{ $posts->links() }}
	                </li>
	            </ul>
	        </div>
	    </div>
	</div>

	<hr>
@endsection
@section('footer')
	<script src="{{ asset('js/app.js') }}"></script>
@endsection