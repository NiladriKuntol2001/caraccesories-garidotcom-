<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('userprofile.css')
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
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('userprofile.sidebar')
      <!-- partial -->
       @include('userprofile.header')
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
              <h1 class="font_size">Update Profile Information</h1>
              <form action="{{url('/add_profile')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_design">
                  <label>NID Number</label>
                  <input class="text_color" type="number" min="0" name="nid" placeholder="Write Your NID" required="">
                </div>
                <div class="div_design">
                  <label>Date Of Birth(DD/MM/YEAR)</label>
                  <input class="text_color" type="text" min="0" name="dateofbirth" placeholder="Write your Date Of Birth" required="">
                </div>
                <div class="div_design">
                  <label>Post Code</label>
                  <input class="text_color" type="number" min="0" name="post" placeholder="Write your post code" required="">
                </div>
                <div class="div_design">
                  <label>Upload your profile photo</label>
                  <input type="file" name="image" required="">
                </div>
                <div class="div_design"> 
                  <input type="submit" value="Update Information" class="btn btn-primary">
                </div>
              </form>
            </div>
          </div>

       </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    @include('userprofile.script')
    <!-- End custom js for this page -->
  </body>
</html>