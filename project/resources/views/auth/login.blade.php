<x-layout>
    <div class="register-container">
        <div class="register-card">
            <h2>Sign In</h2>

            <form action="/login" method="POST" class="register-form">
                @csrf
                
                <input type="email" name="email" placeholder="mail@example.com" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
                @enderror

                <input type="password" name="password" placeholder="Password" required>
                @error('password')
                    <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
                @enderror

                <button type="submit" class="btn-register">Sign In</button>
            </form>

            <div class="divider">OR</div>

            <p class="login-link">
                Don't have an account? <a href="/register">Create one</a>
            </p>
        </div>
    </div>
</x-layout>