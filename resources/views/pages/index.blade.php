@extends('layouts.master')
@section('content')
  <div class="container">
    <div class="row mainmargin">
      <div class="blog col-md-8">
        @if(auth()->check())
        <div class="w-100 text-end">
          <button type="button" class="btn btn-primary w-20 float-right show-modal"  data-route="/addEdit/blog">
            Add Blog
          </button>

        </div>
        @endif
        <div class="all-posts">
     
        </div>
        <nav aria-label="blog navigation">
          <ul class="pagination">
            <!-- <li class="page-item ">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link active" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li> -->
          </ul>
        </nav>
      </div>
      <div class="sidebar col-md-4">
        <div class="input-group">
          <div class="form-outline">
            <input id="search-input" type="search" id="form1" class="form-control" placeholder="search" />
          </div>
          <!-- <button id="search-button" type="button" class="btn dark">
            <i class="fas fa-search"></i>
          </button> -->
        </div>
        <div class="recent-posts pt-5">
        <div class="w-100 d-flex justify-content-between align-items-center">
        <h4 class="">CATEGORIES</h4>
        @if(auth()->check())
          <button type="button" class="btn btn-primary w-20 float-right show-modal"  data-route="/addEdit/category">
            Add 
          </button>
        @endif
        </div>
          
          <div class="categories">
            <ul class="list-group list-group-flush post-item categories-list">
              <li class="list-group-item ">Cras justo odio <span>(7)<span></li>
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