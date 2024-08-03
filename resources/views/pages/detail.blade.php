@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row mainmargin">
      <div class="single-post col-md-8">
        <h2 class="underscore">{{$blog->title??''}}</h2>
        <div class="post-meta">
          <span><i class="far fa-calendar"></i> 30 07 2021</span>
        </div>
        <img src="/getFile?file={{$blog->image_path}}" alt="">
        <p>{{$blog->body}}</p>
        <div class="line"></div>
       
      </div>
      @include('layouts.sidebar')
      </div>
    </div>
  </div>
@endsection