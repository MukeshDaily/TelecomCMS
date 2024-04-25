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
            <p>User Profile: </p>
            {{ $profile[0] }} , {{ $profile[1] }}, {{ $profile[2] }}, {{ $profile[3] }}, {{ $profile[4] }}, {{ $profile[5] }}
            
            <p>My Plan: <font color='red'> {{ $myplan[1] }}</font></p>
            @if ($myplan[3] == 1)
                <p>Plan Status:<font color='red'> Active</font></p>
                
                
            @else
                <p>Plan Status: <font color='red'>Inactive</font></p>
                    <form action="renewCustomerPlan" method="POST">
                    @csrf <!-- {{ csrf_field() }} -->
                    <input type="hidden" name="email" value="{{ $profile[2] }}" /> 
                    <input type="hidden" name="cid" value="{{ $profile[0] }}" />
                    <input type="hidden" name="pid" value="{{ $myplan[1] }}" /> 

                    <input type="submit" value="Renew Now"/>
                    </form>
                    </form>
           

                    <p>Upgrade/DownGrade Your Plan</p>
                    <form action="changeCustomerPlan" method="POST">
                    @csrf <!-- {{ csrf_field() }} -->
                    <input type="hidden" name="email" value="{{ $profile[2] }}" /> 
                    <input type="hidden" name="cid" value="{{ $profile[0] }}" />
                    <input type="hidden" name="opid" value="{{ $myplan[1] }}" /> 

                    <select id="plan" name="npid">
		                <option value="">Select A Plan</option>
                        @foreach ($plans as $plan)
                        <!-- Keep the active plan selected -->
		                <option value="{{ $plan[0] }}" {{ ($plan[0] == $myplan[1] ? "selected":"") }}>{{ $plan[1] }}</option>
                        @endforeach
	                </select>

                    <input type="submit" value="Change Plan"/>
                    </form>
                    </form>
            @endif

            <p> Available Plans</p>
            @foreach ($plans as $plan)
                {{ $plan[0] }} , {{ $plan[1] }}, {{ $plan[2] }}, {{ $plan[3] }}
                <br/>
            @endforeach

        </div>
        </main>

        <footer>
        </footer>

    </body>
</html>
