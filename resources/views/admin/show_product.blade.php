<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
        .h2_font{
            font-size: 40px;
            text-align:center;
            padding-bottom: 40px;
        }
        .img{
            margin: 10px;
            border-radius:10px;
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
                <h2 class="h2_font">All Products</h2>
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Product name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Product image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->product}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            <img src="/product/{{$product->image}}" class="img">
                        </td>
                        
                        <td>
                            <a onclick="return confirm('Are you sure you want to Edit this product?')" class="btn btn-success" href="{{url('edit_product', $product->id)}}">Edit</a>
                        </td>

                        <td>
                            <a onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-danger" href="{{url('delete_product', $product->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>