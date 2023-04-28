<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
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
              <h1 class="font_size">Update Resell Products</h1>
              <form action="{{url('/update_resell_confirm',$resell->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_design">
                  <label>Product Title</label>
                  <input class="text_color" type="text" name="title" placeholder="Write A Title" required="" value="{{$resell->title}}">
                </div>
                <div class="div_design">
                  <label>Product Description</label>
                  <input class="text_color" type="text" name="description" placeholder="Write A Description" required="" value="{{$resell->description}}">
                </div>
                <div class="div_design">
                  <label>Product Price</label>
                  <input class="text_color" type="number" name="price" placeholder="Write the Price" required="" value="{{$resell->price}}">
                </div>
                <div class="div_design">
                  <label>Discount Price</label>
                  <input class="text_color" type="number" name="dis_price" placeholder="Write the Discount price" value="{{$resell->discount_price}}">
                </div>
                <div class="div_design">
                  <label>Product Quantity</label>
                  <input class="text_color" type="number" min="0" name="quantity" placeholder="Write the Quantity" required="" value="{{$resell->quantity}}">
                </div>
                <div class="div_design">
                  <label>Product Category</label>
                  <select class="text_color" name="category" required="">
                    <option value="{{$resell->category}}" selected="">{{$resell->category}}</option>
                    @foreach($category as $category)
                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                  </select>
                
                </div>
                <div class="div_design">
                  <label>Current Product Image</label>
                  <img style="margin:auto;" height="300" width="300" src="/resell/{{$resell->image}}">
                </div>
                <div class="div_design">
                  <label>Change Resell Product Image Here</label>
                  <input type="file" name="image">
                </div>
                <div class="div_design">
                  
                  <input type="submit" value="Update Resell Product" class="btn btn-primary">
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