<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="bg-white p-5 rounded shadow-lg">
        @csrf
        {{-- @dd("here2") --}}

        <!-- Email Address -->
        <div class="mb-4">
            <label for="userId" class="form-label">رقم المستخدم </label>
            <input id="userId" class="form-control @error('userId') is-invalid @enderror" type="text" name="userId"
                value="{{ old('userId') }}" autofocus tabindex="1"
                onkeypress="if(event.key === 'Enter') { event.preventDefault(); document.getElementById('password').focus(); }">
            @error('userId')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="form-label">{{ __('auth.password') }}</label>
            <input id="password" class="form-control @error('password') is-invalid @enderror" type="password"
                name="password" autocomplete="current-password" tabindex="2"
                onkeypress="if(event.key === 'Enter') { event.preventDefault(); document.getElementById('login-button').click(); }">
            @error('password')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>



        <div class="d-flex justify-content-between">
            @if (Route::has('password.request'))
                <a class="text-sm text-primary" href="{{ route('password.request') }}">
                    {{ __('auth.forgot_password') }}
                </a>
            @endif

            <button type="submit" class="btn btn-custom px-4 py-2" id="login-button" tabindex="3">
                {{ __('auth.login') }}
            </button>
        </div>
    </form>
</x-guest-layout>