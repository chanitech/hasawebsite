<form method="post" action="{{ route('password.update') }}">
    @csrf
    @method('put')

    <div class="mb-3">
        <label for="update_password_current_password" class="form-label">Current Password</label>
        <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
        @error('current_password', 'updatePassword')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="update_password_password" class="form-label">New Password</label>
        <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
        @error('password', 'updatePassword')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
        <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
        @error('password_confirmation', 'updatePassword')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Save</button>

    @if (session('status') === 'password-updated')
        <span class="ms-2 text-muted">Saved.</span>
    @endif
</form>
