<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article App</title>
    <link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('build/assets/css/style.css')}}">

 <style>
    .navbar{
        box-shadow: 3px 3px 3px #fff;
    }

    .nav-name{
      font-size: 20px;
      margin-right: 10px;
      color: black;
      text-decoration: none;
      text-transform: capitalize;
    }

    .fa.fa-sign-out{
      color: black;

    }

    .fa.fa-sign-out:hover{
      color: dodgerblue;
    }
 </style>

</head>
<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand py-2" href="{{ route('dashboard') }}"><i class="fa fa-solid fa-car-side fa-lg"></i> Vehicle Rental Application</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            

                    @guest
                      
                    
            
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>
              <li>
              {{--  <form action="{{route('logout')}}" method="get">
                <button type="submit" >LogOut</button>
            </form>  --}}
          
          </li>


               {{--  <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">@if(session()->has('name'))Logout @endif</a>
              </li>  --}}
@endguest



</ul>
@auth 
<a href="{{route('loginuser')}}" class="nav-name">{{auth()->user()->name}}</a>
<li class=" d-flex align-items-right justify-content-right">
  <a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-2x"></i> </a>

</li>
@endauth
            
            
          </div>
        </div>
      </nav>    
        

    


    <!-- dynamic content -->
    @yield('content')


    </body>
</html>