<x-app-layout>
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        @foreach($houses as $house)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <img src="{{$house->url}}" style="width: 260px; height: 140px" alt="Image"> <!-- class="img-fluid" -->
                                                    <div class="mask-icon">
                                                        <a class="cart" href="/details/house/{{$house->id}}">See more details</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>{{$house->house_name}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


