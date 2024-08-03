<div class="modal-header">
    <h5 class="modal-title" id="registrationModalLabel">Register</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form id="registerForm">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username*</label>
            <input type="text" name="name" class="form-control form-control-lg" id="username" placeholder="" required>
            <div class="errors"></div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address*</label>
            <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="" required>
            <div class="errors"></div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password*</label>
            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="" required>
            <div class="errors"></div>
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm Password*</label>
            <input type="password" name="password_confirmation" class="form-control form-control-lg" id="confirmPassword" placeholder="" required>
            <div class="errors"></div>
        </div>
        
        <button type="submit" class="btn btn-primary btn-lg w-100" id="register">Register</button>
    </form>
</div>
<div class="modal-footer">
    <p class="mb-0">Already have an account? <a href="#" class="text-primary show-modal" id="show-login-modal" data-route="/login">Login</a></p>
</div>