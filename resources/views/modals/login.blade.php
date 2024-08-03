<div class="modal-header text-center">
    <h2 class="modal-title" id="loginModalLabel">Login</h2>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form>
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email*</label>
            <input type="text" name="email" class="form-control form-control-lg" id="email" placeholder="" required>
            <div class="errors"></div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password*</label>
            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="" required>
            <div class="errors"></div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg w-100" id="login">Login</button>
    </form>
</div>
<div class="modal-footer">
    <p class="mb-0">Don't have an account? <a href="#" class="text-primary show-modal" data-route="/register">Register</a></p>
</div>