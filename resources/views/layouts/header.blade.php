<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{ asset('images/f2.png') }}" type="">

  <title> HG-Burger </title>

  <!-- bootstrap core css -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Styles -->
 
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />

         
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
 
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />


  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
 
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area" >
    <div class="bg-box">
      <img src="{{ asset('images/hero-bg.jpg') }}"  alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section" >
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a href="{{route('home')}}" class="navbar-brand" >
            <span>
              HG-BURGER
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item active">
                <a href="{{route('home')}}" class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item">
                <a href="{{route('products')}}" class="nav-link" href="menu.html">Menu</a>
              </li>
              <li class="nav-item">
                <a href="{{route('AddProduct')}}" class="nav-link" href="menu.html">Add</a>
              </li>
            
              <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="book.html">Book Table</a>
              </li>
            </ul>
            <div class="user_option">
              <form class="form-inline" method="GET" action="{{route('search')}}">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
           
              <a class="cart_link" href="{{route('cart')}}">
                
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                  <g>
                    <g>
                      <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                   c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                   C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                   c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                   C457.728,97.71,450.56,86.958,439.296,84.91z" />
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                   c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                    </g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                </svg>
                &nbsp;
                @if(Session::has('quantity'))
                <span class="badge badge-danger">{{Session::get('quantity')}}</span>
                @endif
              </a>
            

               
              @if(Auth::check())
              <div class="dropdown">
                <button class="order_online dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <form action="{{route('login')}}" method="GET">
                    <button  class="dropdown-item">
                    
                       Profile
                     
                    </button>
                  </form>
                  <a class="dropdown-item" href="{{route('user_orders')}}">
                    My orders
                  </a>
                 
             
                  <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button  type="submit" class="dropdown-item"> logout  </button>         
                  </form>
                </div>
              </div>
              


              
            
               
            

             
               @else
               <a href="{{route('login')}}" class="order_online">  
                Login
              </a>
              <a href="{{route('register')}}" class="order_online">
               Register
              </a>
              @endif
            </div>

          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->