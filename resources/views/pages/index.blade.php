@extends('layouts.master')
@section('content')
<div class="container">
  <div class="row mainmargin">
    <div class="blog col-md-8">
      <div class="all-posts">
      
      </div>
      <nav aria-label="blog navigation">
        <ul class="pagination justify-content-center">
       
        </ul>
      </nav>
    </div>
    <div class="sidebar col-md-4">
      <div class="input-group">
        <div class="form-outline">
          <input id="search-input" type="search" id="form1" class="form-control" placeholder="search" />
        </div>
      </div>
      <div class="recent-posts pt-5">
        <h4 class="mb-3">CATEGORIES</h4>
        <div class="post-item ">
          <ul class="list-group list-group-flush categories-list">
            <li class="list-group-item">Cras justo odio <span class="badge badge-primary badge-pill text-dark float-end">14</span></li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
          </ul>
        </div>
  
      </div>

    </div>
  </div>
</div>  
@endsection