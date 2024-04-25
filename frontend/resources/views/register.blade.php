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
                    <p>Register</p>
                    <form action="registration" method="POST">
                    @csrf <!-- {{ csrf_field() }} -->
                    <input type="text" id="subcat" name="name" placeholder="Your Name" class="block" required/><br/><br/>
                    <input type="email" id="email" name="email" placeholder="Your Email" class="block" required/><br/><br/>
                    <input type="tel" id="mobile" name="mobile" placeholder="Your Mobile 10 Digit" class="block" pattern="[0-9]{10}" required/><br/><br/>
                    <input type="date" id="dob" name="dob" placeholder="Your DOB" class="block" required/><br/><br/>
                    <input type="text" id="aadhar" name="aadhar" placeholder="12 Digit Aadhar" class="block" pattern="[0-9]{12}" required/><br/><br/>
                    <input type="submit" />
                    </form>

                    <p> <a href="/login">Already registered, login here</a><p>
        </div>
        </main>

        <footer>
        </footer>

    </body>
</html>
