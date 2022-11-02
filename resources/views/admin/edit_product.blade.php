<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')

    <style>
        .div_center{
            align: center;
            padding-top:40px;
        }
        .h2_font{
            font-size: 40px;
            text-align:center;
            padding-bottom: 40px;
        }
        .drop{
            color:black;
            padding: 5px 30px;
        }
        #inputcolor{
            color:black;
        }
        #inputcolorpic{
            color:white;
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
                        <h2 class="h2_font">
                            Edit Product
                        </h2>
                        <div class="row">
                            <div class="col"></div>

                            <div class="col-7 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="forms-sample" action="{{url('/update_product',$products->id)}}" method="POST" enctype="multipart/form-data">
                                        
                                        @csrf

                                        <div class="form-group">
                                            <label for="exampleInputUsername1">product name</label>
                                                <input type="text" class="form-control" name="product" placeholder="Product name" Required="" id="inputcolor" value="{{$products->product}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Description</label>
                                                <input type="text" class="form-control" name="description" placeholder="Description" Required="" id="inputcolor" value="{{$products->description}}">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Product Category</label>
                                                <select name="category" class="drop" Required="">
                                                    <option value="{{$products->category}}" selected="">{{$products->category}}</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->category}}">{{$category->category}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Product Quantity</label>
                                                <input type="number" class="form-control" name="quantity" placeholder="Product quantity" Required="" id="inputcolor" value="{{$products->quantity}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Product Price</label>
                                                <input type="number" class="form-control" name="price" placeholder="Product price" Required="" id="inputcolor" value="{{$products->price}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Discount Price</label>
                                                <input type="number" class="form-control" name="dis_price" placeholder="Discount price" id="inputcolor" value="{{$products->discount_price}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Current Product Image</label>
                                            <img height= "100" width="100" src="/product/{{$products->image}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Change Product Image</label>
                                                <input type="file" class="form-control" name="image" placeholder="Product image" id="inputcolorpic" >
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Update product</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>
                        <div class="col"></div>
                    </div> 
                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>