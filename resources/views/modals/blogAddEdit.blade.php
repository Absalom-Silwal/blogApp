<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">{{!empty($blog)?'Add':'Edit'}} Add</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
        <form id="blogSaveUpdateForm">
            @csrf
            <!-- Name input -->
            <div class="mb-3">
                <input class="form-control" id="title" name="title" type="text" placeholder="Title *" data-sb-validations="required" value="{{!empty($blog)?$blog->title:''}}" />
                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
            </div>
            <div class="mb-3">
                <label for="formFileSm" class="form-label">Small file input example</label>
                <input class="form-control form-control-sm" name="image" id="formFileSm" type="file">
            </div>
            <!-- Message input -->
            <div class="mb-3">
                <label class="form-label" for="comment">Description</label>
                <textarea class="form-control" id="comment" type="text" name="body" placeholder="" style="height: 10rem;" data-sb-validations="required">{{!empty($blog)?$blog->body:''}}</textarea>
                <div class="invalid-feedback" data-sb-feedback="message:required">Comment is required.</div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" id="saveUpdate" data-type="blog" data-id="{{!empty($blog)?$blog->id:''}}">Save changes</button>
</div>