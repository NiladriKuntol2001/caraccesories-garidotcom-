<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/carlogo.png" type="">
      <title>CAR ACCESSORIES BD</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our Resell <span>Products</span>
               </h2>
               <br><br>
               <div>
                  <form action="{{url('resellpage_search')}}" method="GET">
                     @csrf
                     <input type="text" name="search" placeholder="Search for Products!">
                     <button type="submit" class="btn btn-warning">Search!</button>
                  </form>
               </div>
            </div>
            <div class="row">
            @foreach($resell as $resell)
            <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                            <a href="{{url('resell_details', $resell->id)}}" class="option1">
                            Resell Product Details
                            </a>
                            <form action="{{url('resell_order', $resell->id)}}" method="Post">
                              @csrf
                              <div class="row">
                                 <div style="padding: 30px" class="col-md-4">
                                    <input type="number" name="quantity" value="1" min="1" style="width: 100px">
                                 </div>
                                 <div style="padding: 30px" class="col-md-4">
                                    <input type="submit" value="Order Now!" class="option1">
                                 </div>                             
                              </div>
                           </form>
                           </div>
                        </div>
                        <div class="img-box">
                            <img src="resell/{{$resell->image}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                            {{$resell->title}}
                            </h5>
                            @if($resell->discount_price!=0)
                            <h6 style="color: red">
                            TK{{$resell->discount_price}}
                            </h6>
                            <h6 style="text-decoration: line-through; color: black">
                            TK{{$resell->price}}
                            </h6>
                            @else
                            <h6 style="color: black">
                            TK{{$resell->price}}
                            </h6>
                            @endif
                            
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            </div>
         </section>

      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>