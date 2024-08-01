@extends('layouts.master')
@section('content')
  <div class="container">
    <div class="row mainmargin">
      <div class="blog col-md-8">
        <div class="w-100 text-end">
          <button type="button" class="btn btn-primary w-20 float-right show-modal"  data-route="/addEdit/blog">
            Add Blog
          </button>

        </div>
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
          <button type="button" class="btn btn-primary w-20 float-right show-modal"  data-route="/addEdit/category">
            Add 
          </button>

        </div>
          
          <div class="categories">
            <div class="post-item">
              <a href="simple-post.html" class="post-title">Fashion <span>(6)</span></a>
              <div class="post-meta">
                <span><i class="far fa-user"></i> Posted by someone</span><span><i class="far fa-calendar"></i> 30 07 2021</span><span><i class="far fa-comment-alt"></i> 0 comments</span>
              </div>
              <p class="post-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt perspiciatis ex ipsam similique blanditiis. Culpa hic quia...</p>
            </div>
            <div class="post-item">
              <a href="simple-post.html" class="post-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
              <div class="post-meta">
                <span><i class="far fa-user"></i> Posted by someone</span><span><i class="far fa-calendar"></i> 30 07 2021</span><span><i class="far fa-comment-alt"></i> 0 comments</span>
              </div>
              <p class="post-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt perspiciatis ex ipsam similique blanditiis. Culpa hic quia...</p>
            </div>
            <div class="post-item">
              <a href="simple-post.html" class="post-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
              <div class="post-meta">
                <span><i class="far fa-user"></i> Posted by someone</span><span><i class="far fa-calendar"></i> 30 07 2021</span><span><i class="far fa-comment-alt"></i> 0 comments</span>
              </div>
              <p class="post-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt perspiciatis ex ipsam similique blanditiis. Culpa hic quia...</p>
            </div>
          </div>
       
          <a class="main-button">View all posts</a>
          
        </div>

      </div>
    </div>
  </div>    
@endsection