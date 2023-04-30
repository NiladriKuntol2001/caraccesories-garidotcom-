<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our Resell <span>products</span>
               </h2>
               <br><br>
               <div>
                  <form action="{{url('resell_search')}}" method="GET">
                     @csrf
                     <input type="text" name="search" placeholder="Search for Products!">
                     <button type="submit" class="btn btn-warning">Search!</button>
                  </form>
               </div>
            </div>
            <div class="row">
               @foreach($resell as $resell)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('resell_details', $resell->id)}}" class="option1">
                           Resell Product Details
                           </a>
                           <form action="{{url('resell_order', $resell->id)}}" method="Post">
                              @csrf
                              <div class="row">
                                 <div style="padding: 30px" class="col-md-4">
                                    <input type="number" name="quantity" value="1" min="1" style="width: 100px">
                                 </div>
                                 <div style="padding: 30px" class="col-md-4">
                                    <input type="submit" value="Order Now!" class="option1">
                                 </div>                             
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="resell/{{$resell->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$resell->title}}
                        </h5>
                        @if($resell->discount_price!=0)
                        <h6 style="color: red">
                           TK{{$resell->discount_price}}
                        </h6>
                        <h6 style="text-decoration: line-through; color: black">
                           TK{{$resell->price}}
                        </h6>
                        @else
                        <h6 style="color: black">
                           TK{{$resell->price}}
                        </h6>
                        @endif
                        
                     </div>
                  </div>
               </div>
               @endforeach
            </div>   
         </div>
      </section>