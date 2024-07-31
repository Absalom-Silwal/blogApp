@extends('layouts.master')
@section('content')
  <div class="container">
    <div class="row mainmargin">
      <div class="blog col-md-8">
        <div class="all-posts">
          <div class="post-item">
            <div class="post-img"><img src="https://stc.firmbee.com/html-prev/Freebees_webdesign_9_prev/img/architecture-1857175_1920.jpg" alt=""></div>
            <div class="post-main-info">
              <p class="post-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              <div class="post-meta">
                <span><i class="far fa-user"></i> Posted by someone</span><span><i class="far fa-calendar"></i> 30 07 2021</span><span><i class="far fa-comment-alt"></i> 0 comments</span>
              </div>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum beatae pariatur sequi vitae quia velit? Facere maxime delectus cum voluptas unde accusantium rerum ullam rem asperiores. Alias, omnis quidem....</p>
              <a href="./single-post.html" class="main-button">Read More</a>
            </div>
          </div>
          <div class="post-item">
            <div class="post-img"><img src="https://stc.firmbee.com/html-prev/Freebees_webdesign_9_prev/img/building-1727807_1920.jpg" alt=""></div>
            <div class="post-main-info">
              <p class="post-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              <div class="post-meta">
                <span><i class="far fa-user"></i> Posted by someone</span><span><i class="far fa-calendar"></i> 30 07 2021</span><span><i class="far fa-comment-alt"></i> 0 comments</span>
              </div>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum beatae pariatur sequi vitae quia velit? Facere maxime delectus cum voluptas unde accusantium rerum ullam rem asperiores. Alias, omnis quidem....</p>
              <a href="./single-post.html" class="main-button">Read More</a>
            </div>
          </div>
          <div class="post-item">
            <div class="post-img"><img src="https://stc.firmbee.com/html-prev/Freebees_webdesign_9_prev/img/castle-1998435_1920.jpg" alt=""></div>
            <div class="post-main-info">
              <p class="post-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              <div class="post-meta">
                <span><i class="far fa-user"></i> Posted by someone</span><span><i class="far fa-calendar"></i> 30 07 2021</span><span><i class="far fa-comment-alt"></i> 0 comments</span>
              </div>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum beatae pariatur sequi vitae quia velit? Facere maxime delectus cum voluptas unde accusantium rerum ullam rem asperiores. Alias, omnis quidem....</p>
              <a href="./single-post.html" class="main-button">Read More</a>
            </div>
          </div>
          <div class="post-item">
            <div class="post-img"><img src="https://stc.firmbee.com/html-prev/Freebees_webdesign_9_prev/img/architecture-1857175_1920.jpg" alt=""></div>
            <div class="post-main-info">
              <p class="post-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              <div class="post-meta">
                <span><i class="far fa-user"></i> Posted by someone</span><span><i class="far fa-calendar"></i> 30 07 2021</span><span><i class="far fa-comment-alt"></i> 0 comments</span>
              </div>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum beatae pariatur sequi vitae quia velit? Facere maxime delectus cum voluptas unde accusantium rerum ullam rem asperiores. Alias, omnis quidem....</p>
              <a href="./single-post.html" class="main-button">Read More</a>
            </div>
          </div>
          <div class="post-item">
            <div class="post-img"><img src="https://stc.firmbee.com/html-prev/Freebees_webdesign_9_prev/img/castle-1998435_1920.jpg" alt=""></div>
            <div class="post-main-info">
              <p class="post-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              <div class="post-meta">
                <span><i class="far fa-user"></i> Posted by someone</span><span><i class="far fa-calendar"></i> 30 07 2021</span><span><i class="far fa-comment-alt"></i> 0 comments</span>
              </div>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum beatae pariatur sequi vitae quia velit? Facere maxime delectus cum voluptas unde accusantium rerum ullam rem asperiores. Alias, omnis quidem....</p>
              <a href="./single-post.html" class="main-button">Read More</a>
            </div>
          </div>
          
        </div>
        <nav aria-label="blog navigation">
          <ul class="pagination">
            <li class="page-item ">
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
            </li>
          </ul>
        </nav>
      </div>
      <div class="sidebar col-md-4">
        <div class="input-group">
          <div class="form-outline">
            <input id="search-input" type="search" id="form1" class="form-control" placeholder="search" />
          </div>
          <button id="search-button" type="button" class="btn dark">
            <i class="fas fa-search"></i>
          </button>
        </div>
        <div class="recent-posts pt-5">
          <h4 class="mb-3">CATEGORIES</h4>
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
          <a class="main-button">View all posts</a>
          
        </div>

      </div>
    </div>
  </div>    
@endsection