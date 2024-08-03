<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">{{empty($blog)?'Add':'Edit'}} Blog</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form id="blogSaveUpdateForm">
            @csrf
            <!-- Name input -->
            <div class="mb-3">
                <label for="title">Title</label>
                <input class="form-control form-control-lg" id="title" name="title" type="text" placeholder="" data-sb-validations="required" value="{{!empty($blog)?$blog->title:''}}" />
                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
            </div>
            <div class="mb-3">
                <label for="image">Image</label>
                <input class="form-control form-control-lg" name="image" id="image" type="file">
            </div>
            <div class="mb-3">
                <label for="category">Choose Category</label>
                <select class="form-select form-select-lg" name="category_id" id="category" aria-label="Default select example">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if(!empty($blog) && $category->id == $blog->category_id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <!-- Message input -->
            <div class="mb-3">
                <label class="form-label" for="comment">Description</label>
                <textarea class="form-control form-control-lg" id="comment" type="text" name="body" placeholder="" style="height: 10rem;" data-sb-validations="required">{{!empty($blog)?$blog->body:''}}</textarea>
                <div class="invalid-feedback" data-sb-feedback="message:required">Comment is required.</div>
            </div>
        </form>
    </div>
    <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" id="saveUpdate" data-type="blog" data-id="{{!empty($blog)?$blog->id:''}}">Save changes</button>
</div>