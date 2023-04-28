<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('userprofile.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('userprofile.sidebar')
      <!-- partial -->
       @include('userprofile.header')
        <!-- partial -->
        <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width:50%; padding: 30px">
                @foreach($userprofile as $userprofile)
                  <div class="img-box">
                     <img width=200px height=200px src="userprofile/{{$userprofile->image}}" alt="">
                  </div>
                  <div class="detail-box">
                     <h5>
                        {{$userprofile->name}}
                     </h5>
                     <h6>User Email: {{$userprofile->email}}</h6>
                     <h6>User Address: {{$userprofile->address}}</h6>
                     <h6>User Phone: {{$userprofile->phone}}</h6>
                     <h6>User Date of Birth: {{$userprofile->dateofbirth}}</h6>
                     <h6>User NID Number: {{$userprofile->nid}}</h6>
                     <h6>User Postal Code: {{$userprofile->post}}</h6>
                  </div>
                @endforeach
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