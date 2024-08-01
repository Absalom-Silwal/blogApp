<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">{{$empty($category)?'Add':'Edit'}} Category</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
        <form id="blogSaveUpdateForm">
            @csrf
            <!-- Name input -->
            <div class="mb-3">
                <input class="form-control" id="title" name="title" type="text" placeholder="Title *" data-sb-validations="required" value="{{!empty($category)?$blog->name:''}}" />
                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
            </div>  
        </form>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" id="saveUpdate" data-type="category" data-id="{{!empty($category)?$category->id:''}}">Save changes</button>
</div>