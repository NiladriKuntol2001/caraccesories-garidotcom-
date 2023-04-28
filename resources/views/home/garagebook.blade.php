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
      
      <style type="text/css">
      .div_center
      {
        text-align: center;
        padding-top: 40px;
      }

      .font_size
      {
        font-size: 40px;
        padding-bottom: 40px;
      }

      .text_color
      {
        color: black;
        padding-bottom: 20px;
      }

      label
      {
        display: inline-block;
        width: 200px;
      }

      .div_design
      {
        padding-bottom: 15px;
      }
    </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->

         <!-- end slider section -->
      <!-- why section -->
              @if(session()->has('message'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
              </div>
              @endif
            <div class="div_center">
              <h1 class="font_size">BOOK Your Garage(Only In Dhaka)</h1>
              <form action="{{url('/done_garage')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_design">
                  <label>Name</label>
                  <input class="text_color" type="text" name="name" placeholder="Write A Name" required="">
                </div>
                <div class="div_design">
                  <label>Address</label>
                  <input class="text_color" type="text" name="address" placeholder="Write the address" required="">
                </div>
                <div class="div_design">
                  <label>Phone</label>
                  <input class="text_color" type="number" name="phone" placeholder="Write phone number" required="">
                </div>
                <div class="div_design">
                  <label>Email</label>
                  <input class="text_color" type="text" name="email" placeholder="Write the email" required="">
                </div>
                <div class="div_design">
                  <label>Date(DD/MM/YYYY)</label>
                  <input class="text_color" type="text" name="date" placeholder="Write the date" required="">
                </div>
                <div class="div_design">
                  <label>Select Service </label>
                  <select class="text_color" name="service" required="">
                    <option value="" selected="">Add A service Here</option>
                    <option>Car Full Servicing</option>
                    <option>Engine Conversion(Petrol to LPG)</option>
                    <option>Install CNG cylinder</option>
                    <option>Car Wash</option>
                    <option>Car Parts Installation</option>
                    <option>Modify Car</option>
                  </select>
                </div>
                <div class="div_design">
                  <label>Select Shift </label>
                  <select class="text_color" name="shift" required="">
                    <option value="" selected="">Add A Shift Here</option>
                    <option>Morning Shift(10AM-1PM)</option>
                    <option>Afternoon Shift(3PM-6PM)</option>
                    <option>Evening Shift(6PM-9PM)</option>
                  </select>
                </div>
                <div class="div_design">
                  <label>Availble Garage</label>
                  <select class="text_color" name="garage" required="">
                    <option value="" selected="">Add A Garage Here</option>
                    @foreach($garage as $garage)
                    <option value="{{$garage->garage_name}}">{{$garage->garage_name}} {{$garage->garage_location}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="btn-box">                 
                  <input type="submit" value="Book Garage" class="btn btn-primary">
                </div>
              </form>

            </div>
        </div>
      <!-- end client section -->
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