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
            <p>Profile</p>
            {{ $profile[0] }} , {{ $profile[1] }}, {{ $profile[2] }}, {{ $profile[3] }}, {{ $profile[4] }}, {{ $profile[5] }}
            
            <p> Available Plans</p>
            @foreach ($plans as $plan)
                {{ $plan[0] }} , {{ $plan[1] }}, {{ $plan[2] }}, {{ $plan[3] }}
                <br/>
            @endforeach

                    <p>Please Select Your Plan</p>
                    <form action="createCustomerPlan" method="POST">
                    @csrf <!-- {{ csrf_field() }} -->
                    <input type="hidden" name="email" value="{{ $profile[2] }}" /> 
                    <input type="hidden" name="cid" value="{{ $profile[0] }}" /> 

                    <select id="plan" name="pid">
		                <option value="">Select A Plan</option>
                        @foreach ($plans as $plan)
		                <option value="{{ $plan[0] }}">{{ $plan[1] }}</option>
                        @endforeach
	                </select>

                    <input type="submit" value="Start Plan"/>
                    </form>
                    </form>

        </div>
        </main>

        <footer>
        </footer>

    </body>
</html>
