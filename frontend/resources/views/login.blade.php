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
                    <p>Login Now</p>
                    <form action="dashboard" method="POST">
                    @csrf <!-- {{ csrf_field() }} -->
                    <input type="email" id="email" value="{{ $email }}" name="email" placeholder="Your Email" class="block" required/><br/><br/>
                    <input type="submit" value="Login Now"/>
                    </form>
                    </form>

        </div>
        </main>

        <footer>
        </footer>

    </body>
</html>
