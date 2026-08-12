<p class="text-muted">
    Once your account is deleted, all of its resources and data will be permanently deleted.
    Please enter your password to confirm you would like to permanently delete your account.
</p>

<form method="post" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account? This cannot be undone.')">
    @csrf
    @method('delete')

    <div class="mb-3" style="max-width: 320px;">
        <label for="delete_password" class="form-label visually-hidden">Password</label>
        <input id="delete_password" name="password" type="password" class="form-control" placeholder="Password">
        @error('password', 'userDeletion')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-danger">Delete Account</button>
</form>
