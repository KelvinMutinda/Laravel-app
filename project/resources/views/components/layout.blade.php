<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite(['resources/css/app.css'])

    <!-- Toast CSS (Can be moved to app.css later) -->
    <style>
        .toast-success {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #10b981; /* Tailwind green-500 */
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 50;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            animation: slideIn 0.3s ease-out forwards;
        }

        /* Optional: Fade out animation */
        .toast-success.hide {
            animation: fadeOut 0.5s ease-in forwards;
        }

        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="#" class="navbar-brand">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
            Chirper
        </a>

              <div class="navbar-links">
            @auth
                <!-- This shows if the user IS logged in -->
                <span style="font-weight: 600; color: #374151; margin-right: 1rem;">{{ auth()->user()->name }}</span>
                <form action="/logout" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: #ef4444; font-weight: 600; cursor: pointer; font-size: 0.9rem;">Logout</button>
                </form>
            @else
                <!-- This shows if the user is NOT logged in -->
                <a href="/login">Sign In</a>
                <a href="/register" class="btn-signup">Sign Up</a>
            @endauth
        </div>
    </div>

    {{ $slot }}

    <!-- The Toast HTML -->
    @if(session('success'))
        <div id="toast" class="toast-success">
            <!-- Optional Checkmark Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            {{ session('success') }}
        </div>
    @endif

    <!-- The Toast JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toast = document.getElementById('toast');
            if (toast) {
                // Wait 3 seconds, add the 'hide' class, then remove the element
                setTimeout(() => {
                    toast.classList.add('hide');
                    setTimeout(() => {
                        toast.remove();
                    }, 500); // Wait for the fade out animation to finish
                }, 3000);
            }
        });
    </script>
</body>
</html>