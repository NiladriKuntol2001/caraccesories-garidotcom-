<header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="images/carlogo1.png"></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Our Service<span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a class="nav-link" href="{{url('homeservice')}}">Home Servicing</a></li>
                              <li><a class="nav-link" href="{{url('garage_book')}}">Car service Garage Booking</a></li>
                           </ul>
                        </li>
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">All Products<span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a class="nav-link" href="{{url('product_page')}}">Product</a></li>
                              <li><a class="nav-link" href="{{url('resell_product')}}">Resell Product</a></li>
                           </ul>
                        </li>
                        <!--<li class="nav-item">
                           <a class="nav-link" href="{{url('product_page')}}">Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('resell_product')}}">Resell Products</a>
                        </li>-->
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Customer Orders<span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a class="nav-link" href="{{url('show_homeservice')}}">See Home Servicing Bookings</a></li>
                              <li><a class="nav-link" href="{{url('show_garagebook')}}">See Garage Bookings</a></li>
                              <li><a class="nav-link" href="{{url('show_order')}}">Product Order</a></li>
                              <li><a class="nav-link" href="{{url('show_resell_order')}}">Resell Product Order</a></li>
                           </ul>
                        </li>
                        <!--<li class="nav-item">
                           <a class="nav-link" href="{{url('show_order')}}">Order</a>
                        </li>-->
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_cart')}}">Cart</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_profile')}}">Profile</a>
                        </li>
                        <form class="form-inline">
                           <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                           <i class="fa fa-search" aria-hidden="true"></i>
                           </button>
                        </form>
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                           <x-app-layout>

                           </x-app-layout>
                        </li>
                        @else
                        <li class="nav-item">
                           <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                           <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth
                        @endif
                        
                     </ul>
                  </div>
               </nav>
            </div>
         </header>