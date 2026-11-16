<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite(['resources/css/app.css'])
</head>
<body>

    <div class="navbar">
     
        <a href="#" class="navbar-brand">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
            Chirper
        </a>

  
        <div class="navbar-links">
            <a href="#">Sign In</a>
            <a href="#" class="btn-signup">Sign Up</a>
        </div>
    </div>

   
    {{ $slot }}

</body>
</html>