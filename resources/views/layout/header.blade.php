<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="logo">
                <img src="{{ asset('assets/images/jobPulse/logo.png') }}" width="100px" height="100px" alt="">
            </div>
        </div>
        <div class="col-md-8">
            <div class="menu">
                <ul class="li">Home</ul>
                <ul class="li">About</ul>
                <ul class="li">Job</ul>
                <ul class="li">Contact</ul>

                @auth
                    <ul class="li"><a href="{{ url('/dashboard') }}">Dashboard</a></ul>
               
                   

                @endauth

                @guest

                    <ul class="li"><a href="{{ route('login') }}">Login</a></ul>
                    <ul class="li"><a href="{{ url('/companies/register') }}">Register as a company</a></ul>
                    <ul class="li"><a href="{{ url('/candidate/register') }}">Register as a candidate</a></ul>

                @endguest





            </div>
        </div>
    </div>
</div>