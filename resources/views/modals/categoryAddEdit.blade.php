<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">{{empty($category)?'Add':'Edit'}} Category</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form id="categorySaveUpdateForm">
            @csrf
            <!-- Name input -->
            <div class="mb-3">
                <label for="name">Name</label>
                <input class="form-control form-control-lg" id="name" name="name" type="text" placeholder="" data-sb-validations="required" value="{{!empty($category)?$category->name:''}}" />
                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
            </div>  
        </form>
    </div>
    <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary " id="saveUpdate" data-type="category" data-id="{{!empty($category)?$category->id:''}}">Save changes</button>
</div>