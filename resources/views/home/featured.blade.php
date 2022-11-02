<section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".Mazeflour">Maize flour</li>
                            <li data-filter=".Wheatflour">wheat flour</li>
                            <li data-filter=".BabyCare">Baby care</li>
                            <li data-filter=".Breakfast_and_Snacks">Breakfast and snacks</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="row featured__filter">
                @foreach($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix {{$product->category}}">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="/product/{{$product->image}}">
                                <ul class="featured__item__pic__hover">
                                    <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li> -->
                                    
                                    <li>
                                        <form action="{{url('add_cart', $product->id)}}" method ="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-4" style="margin-right:10px">
                                                    <input type="number" name="Quantity" value="1" min="1" style="width: 80px;">
                                                </div>
                                                <div class="col-md-4" style="margin-left:10px">
                                                    <a href=""><i class="fa fa-shopping-cart"></i></a>
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="#">{{$product->product}}</a></h6>
                                <h5>Ksh. {{$product->price}}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>