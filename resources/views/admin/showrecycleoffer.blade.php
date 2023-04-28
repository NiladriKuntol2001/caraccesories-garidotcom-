<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .title_deg
        {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 50px;
        }
        .table_deg
        {
            border: 2px solid white;
            width: 100%;
            margin: auto;
            text-align: center;
        }
        .th_deg
        {
            background-color: skyblue;
        }
        .img_size
        {
            width: 200px;
            height: 100px;
        }
        .search_deg
        {
            margin: auto;
            padding-bottom: 30px;
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
                <h1 class="title_deg">All Recycle Request</h1>
                <div class="search_deg">
                    <form action="{{url('recyclesearch')}}" method="get">
                        @csrf
                        <input type="text" style="color: black;" name="search" placeholder="search for something">
                        <input type="submit" value="search" class="btn btn-outline-primary">
                    </form>
                </div>
                <table class="table_deg">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Image</th>
                    </tr>
                    @forelse($recycle as $recycle)
                    <tr>
                        <td>{{$recycle->name}}</td>
                        <td>{{$recycle->email}}</td>
                        <td>{{$recycle->address}}</td>
                        <td>{{$recycle->phone}}</td>
                        <td>{{$recycle->title}}</td>
                        <td>{{$recycle->quantity}}</td>
                        <td>{{$recycle->category}}</td>
                        <td><img class="img_size" src="/recycle/{{$recycle->image}}"></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="16">
                            No Data Found
                        </td>
                    </tr>
                    @endforelse
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