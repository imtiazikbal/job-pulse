<div class="container-fluid">
    <div class="row navbar d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="logo">
                <a href="{{ url('/') }}"><img src="{{ asset('assets') }}/images/jobPulse/logo.png" alt=""></a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="menu nav">
                <ul class="li"><a href="{{ url('/') }}">Home</a></ul>
                <ul class="li" ><a  href="{{ url('/aboutPage') }}">About</a></ul>
                <ul class="li"><a href="{{ url('/allJobs') }}">Jobs</a></ul>
                <ul class="li"><a href="{{ url('/contact') }}">Contact</a>
                </ul>
            
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

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    span,
    p {
        font-family: 'Poppins', sans-serif;
        color: black
    }

    #mr-5 {
        margin-right: 5px
    }

    .menu {
        display: flex;
        justify-content: space-between;
    }

    .menu ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    .menu li {
        float: left;
    }

    .menu ul li a {

        color: white;
        text-align: center;
        padding: 10px;
        text-decoration: none;
    }

    .menu li a:hover {
        background-color: #111;
    }

    .logo {
        display: flex;
        justify-content: center;
        align-items: center;

    }
    .logo img{
        width: 50%;
    }

    .navbar {
  background: rgb(237, 241, 242);
}
</style>