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
        .center
        {
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
        }
        .font_size
        {
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }
        .img_size
        {
            width: 250px;
            height: 250px;
        }
        .th_color
        {
            background: skyblue;
        }
        .th_deg
        {
            padding: 30px;
        }
    </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         @if(session()->has('message'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                  {{session()->get('message')}}
                </div>
                @endif
                <h2 class="font_size">All Homeservice Bookings</h2>
                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">Name</th>
                        <th class="th_deg">Address</th>
                        <th class="th_deg">Phone</th>
                        <th class="th_deg">Email</th>
                        <th class="th_deg">Region</th>
                        <th class="th_deg">Service Type</th>
                        <th class="th_deg">Shift</th>
                        <th class="th_deg">Date</th>
                        <th class="th_deg">Cancelation</th>
                        <th class="th_deg">Edit</th>
                    </tr>
                    @foreach($homeservice as $homeservice)
                    <tr>
                        <td>{{$homeservice->name}}</td>
                        <td>{{$homeservice->address}}</td>
                        <td>{{$homeservice->phone}}</td>
                        <td>{{$homeservice->email}}</td>
                        <td>{{$homeservice->region}}</td>
                        <td>{{$homeservice->service}}</td>
                        <td>{{$homeservice->shift}}</td>
                        <td>{{$homeservice->date}}</td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to Cancel This?')" href="{{url('delete_homeservice', $homeservice->id)}}">Cancel</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('update_homeservice', $homeservice->id)}}">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
      <!-- end product section -->

      <!-- subscribe section -->

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