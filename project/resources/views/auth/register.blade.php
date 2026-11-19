<x-layout>
    <div class="register-container">
        <div class="register-card">
            <h2>Create Account</h2>

            <form action="/register" method="POST" class="register-form">
                @csrf
                
                <!-- Name -->
                <input type="text" name="name" placeholder="John Doe" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
                @enderror

                <!-- Email -->
                <input type="email" name="email" placeholder="mail@example.com" value="{{ old('email') }}" required>
                @error('email')
                    <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
                @enderror

                <!-- Password -->
                <input type="password" name="password" placeholder="Password" required>
                @error('password')
                    <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
                @enderror

                <!-- Confirm Password -->
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

                <button type="submit" class="btn-register">Register</button>
            </form>

            <div class="divider">OR</div>

            <p class="login-link">
                Already have an account? <a href="/login">Sign in</a>
            </p>
        </div>
    </div>
</x-layout>