<div class="modal-header">
    <h5 class="modal-title" id="registrationModalLabel">Register</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form id="registerForm">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username*</label>
            <input type="text" name="name" class="form-control" id="username" placeholder="" required>
            <div class="errors"></div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address*</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="" required>
            <div class="errors"></div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password*</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="" required>
            <div class="errors"></div>
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm Password*</label>
            <input type="password" name="password_confirmation" class="form-control" id="confirmPassword" placeholder="" required>
            <div class="errors"></div>
        </div>
        
        <button type="submit" class="btn btn-primary" id="register">Register</button>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>