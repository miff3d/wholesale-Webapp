<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center{
            text-align:center;
            padding-top:40px;
        }
        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input{
            color:black;
            width: 50%;
            padding: 12px 20px;
            margin-bottom: 50px;
        }
        /* .table_center{
            margin: auto;
            margin-top: 50px;
            width: 50%;
            text-align: center;
            border: 1px solid #41a514;
        } */
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
                        Add Category
                    </h2>

                    <form action="{{url('/add_category')}}" method="POST">

                    @csrf
                        <input class="input" type="text" name="name" placeholder="add category">

                        <input type="submit" class="btn btn-primary" name="submit" value="add category">
                    </form>
                </div>

                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Category name</th>
                        <th>Action</th>
                    </tr>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category}}</td>
                        <td>
                            <a onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger" href="{{url('delete_category', $category->id)}}">Delete</a>
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