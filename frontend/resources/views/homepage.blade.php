<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
      
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
       
        <main class="mt-6">
        <div class="scale-100 p-6">
            {{ $message; }}
            <h2> Telecom CMS </h2>
            <a href="/login">Login</a> | 
            <a href="/register">Register</p>
                   
        </div>
        </main>

        <footer>
        </footer>

    </body>
</html>
