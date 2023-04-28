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

         <!-- end header section -->
         @if(session()->has('message'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
              </div>
              @endif
            <div class="div_center">
              <h1 class="font_size">Update your Homeservice Booking</h1>
              <form action="{{url('/update_homeservice_confirm', $homeservice->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_design">
                  <label>Name</label>
                  <input class="text_color" type="text" name="name" placeholder="Write A Name" required="" value="{{$homeservice->name}}">
                </div>
                <div class="div_design">
                  <label>Address</label>
                  <input class="text_color" type="text" name="address" placeholder="Write the address" required="" value="{{$homeservice->address}}">
                </div>
                <div class="div_design">
                  <label>Phone</label>
                  <input class="text_color" type="number" name="phone" placeholder="Write phone number" required="" value="{{$homeservice->phone}}">
                </div>
                <div class="div_design">
                  <label>Email</label>
                  <input class="text_color" type="text" name="email" placeholder="Write the email" required="" value="{{$homeservice->email}}">
                </div>
                <div class="div_design">
                  <label>Select Region</label>
                  <select class="text_color" name="region" required="">
                    <option value="{{$homeservice->region}}">Add A Region Here</option>
                    <option>Pallabi Thana</option>
                    <option>Mirpur Thana</option>
                    <option>Tejgaon Thana Region</option>
                    <option>Kotwali Thana Region</option>
                    <option>Dhanmondi Thana Region</option>
                    <option>Mohammadpur Thana Region</option>
                    <option>Hajaribagh Thana Region</option>
                  </select>
                </div>
                <div class="div_design">
                  <label>Select Available Service Type </label>
                  <select class="text_color" name="service" required="">
                    <option value="{{$homeservice->service}}">Add A service Type Here</option>
                    <option>Car Wash</option>
                    <option>Car Servicing</option>
                    <option>Package(Car Wash and Car Service)</option>
                    <option>Car Checking and replace parts</option>
                    <option>All Service</option>
                  </select>
                </div>
                <div class="div_design">
                  <label>Select Shift</label>
                  <select class="text_color" name="shift" required="">
                    <option value="{{$homeservice->shift}}">Add A Shift Here</option>
                    <option>Morning Shift(10AM-1PM)</option>
                    <option>Afternoon Shift(3PM-6PM)</option>
                    <option>Evening Shift(6PM-9PM)</option>
                  </select>
                </div>
                <div class="div_design">                 
                  <input type="submit" value="Book Homeservice" class="btn btn-primary">
                </div>
              </form>
            </div>
            <li class="div_center">
                <a class="nav-link" href="{{url('/')}}">Return <span class="sr-only">Home</span></a>
            </li>

      <!-- end client section -->
      <!-- footer start -->
      <!-- footer end -->

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