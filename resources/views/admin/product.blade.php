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
              <h1 class="font_size">Add Products</h1>
              <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_design">
                  <label>Product Title</label>
                  <input class="text_color" type="text" name="title" placeholder="Write A Title" required="">
                </div>
                <div class="div_design">
                  <label>Product Description</label>
                  <input class="text_color" type="text" name="description" placeholder="Write A Description" required="">
                </div>
                <div class="div_design">
                  <label>Product Price</label>
                  <input class="text_color" type="number" name="price" placeholder="Write the Price" required="">
                </div>
                <div class="div_design">
                  <label>Discount Price</label>
                  <input class="text_color" type="number" name="dis_price" placeholder="Write the Discount price">
                </div>
                <div class="div_design">
                  <label>Product Quantity</label>
                  <input class="text_color" type="number" min="0" name="quantity" placeholder="Write the Quantity" required="">
                </div>
                <div class="div_design">
                  <label>Product Category</label>
                  <select class="text_color" name="category" required="">
                    <option value="" selected="">Add A Category Here</option>
                    @foreach($category as $category)
                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                  </select>
                
                </div>
                <div class="div_design">
                  <label>Product Image Here</label>
                  <input type="file" name="image" required="">
                </div>
                <div class="div_design">
                  
                  <input type="submit" value="Add Product" class="btn btn-primary">
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
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>