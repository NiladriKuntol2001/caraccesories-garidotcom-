<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
        
        .input_color
        {
          color:black;
        }

        .center
        {
          margin: auto;
          width: 50%;
          text-align: center;
          margin-top: 30px;
          border: 3px solid white;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
       @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                  {{session()->get('message')}}
                </div>
                @endif
                
                <div class="div_center">
                    
                    <h2 class="h2_font">Add Garage</h2>
                    <form action="{{url('/add_garage')}}" method="POST">
                      @csrf
                      <input class="input_color" type="text" name="garage_name" placeholder="Write Garage name" required="">
                      <input class="input_color" type="text" name="garage_location" placeholder="Write Garage location" required="">
                      <div class="div_design">
                            <input type="submit" value="Add Garage" class="btn btn-primary">
                        </div>
                      
                    </form>
            
                </div>
                <table class="center">
                  <tr>
                    <td>Garage Name</td>
                    <td>Garage Location</td>
                    <td>Action</td>
                  </tr>

                  @foreach($garage as $garage)

                  <tr>
                    <td>{{$garage->garage_name}}</td>
                    <td>{{$garage->garage_location}}</td>
                    <td>
                      <a onclick="return confirm('Are you sure you want to delete this category?')" class="btn btn-danger" href="{{url('delete_garage',$garage->id)}}">Delete</a>
                    </td>
                  </tr>

                  @endforeach

                </table>
            </div>
        
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>