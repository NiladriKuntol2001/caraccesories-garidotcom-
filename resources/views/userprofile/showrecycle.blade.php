<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('userprofile.css')
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
                <h2 class="font_size">All Recycle Products</h2>
                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">Product Title</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Quantity</th>
                        <th class="th_deg">Category</th>
                        <th class="th_deg">Product Image</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Edit</th>
                    </tr>
                    @foreach($recycle as $recycle)
                    <tr>
                        <td>{{$recycle->title}}</td>
                        <td>{{$recycle->description}}</td>
                        <td>{{$recycle->quantity}}</td>
                        <td>{{$recycle->category}}</td>
                        <td>
                            <img class= "img_size" src="/recycle/{{$recycle->image}}">
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to Delete This?')" href="{{url('delete_recycle', $recycle->id)}}">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('update_recycle', $recycle->id)}}">Edit</a>
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
    @include('userprofile.script')
    <!-- End custom js for this page -->
  </body>
</html>