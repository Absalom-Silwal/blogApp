<div class="sidebar col-md-4">
    <div class="input-group">
      <div class="form-outline">
        <input id="search-input" type="search" id="form1" class="form-control" placeholder="search by title or body content " />
      </div>
    </div>
    <div class="recent-posts pt-5">
      <div class="col-12 d-flex align-items-center justify-content-between mb-3">
        <h4 class="m-0">Categories</h4>
        @if(auth()->check())
        <a class=" btn btn-primary float-end show-modal" data-route="/addEdit/category"> <i class="fas fa-plus"></i> Categories</a>
        @endif
      </div>
      
      
        
      
      
      <div class="post-item ">
        <ul class="list-group list-group-flush categories-list">
          
        </ul>
      </div>

    </div>

  </div>