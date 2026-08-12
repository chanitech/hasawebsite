<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ route('profile.update') }}">
    @csrf
    @method('patch')

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <p class="text-sm mt-2">
                Your email address is unverified.
                <button form="send-verification" class="btn btn-link p-0 align-baseline">Click here to re-send the verification email.</button>
            </p>

            @if (session('status') === 'verification-link-sent')
                <p class="text-success">A new verification link has been sent to your email address.</p>
            @endif
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Save</button>

    @if (session('status') === 'profile-updated')
        <span class="ms-2 text-muted">Saved.</span>
    @endif
</form>
