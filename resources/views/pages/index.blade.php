@extends('layouts.master')
@section('content')
<div class="container">
  <div class="row mainmargin">
    <div class="blog col-md-8">
      @if(auth()->check())
      <div class="col-12 mb-5">
        <a class=" btn btn-primary float-end show-modal" data-route="/addEdit/blog"> <i class="fas fa-plus"></i> Blogs</a><br>
      </div>
      @endif
      <div class="all-posts">
      
      </div>
      <nav aria-label="blog navigation">
        <ul class="pagination justify-content-center">
       
        </ul>
      </nav>
    </div>
    @include('layouts.sidebar')
  </div>
</div>  
@endsection

