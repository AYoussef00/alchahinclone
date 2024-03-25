<div class="card-header">
    <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0">
        <img width="20" src="{{asset('assets/back-end/img/featured_deal.png')}}" alt="">
        {{translate('most_Rated_Products')}}
    </h4>
</div>

<div class="card-body">
    @if($mostRatedProducts)
        <div class="row">
            <div class="col-12">
                <div class="grid-card-wrap">
                    @foreach($mostRatedProducts as $key => $product)
                        @if(isset($product['id']))
                            <div class="cursor-pointer grid-card basic-box-shadow get-view-by-onclick"
                                 data-link="{{ route('admin.products.view',['id'=>$product['id']]) }}">
                                <div>
                                    <img class="avatar avatar-bordered border-gold avatar-60 rounded"
                                         src="{{ getValidImage(path: 'storage/app/public/product/thumbnail/'.$product['thumbnail'], type: 'backend-product') }}"
                                         alt="{{$product->name}}{{translate('image')}}">
                                </div>
                                <div class="fz-12 title-color text-center">
                                    {{isset($product['name']) ? substr($product->name, 0, 30) . (strlen($product->name)>20?'...':''):'not exists'}}
                                </div>
                                <div class="d-flex align-items-center gap-1 fz-10">
                                    <span class="rating-color d-flex align-items-center font-weight-bold gap-1">
                                        <i class="tio-star"></i>
                                        {{round($product['ratings_average'],2)}}
                                    </span>
                                    <span class="d-flex align-items-center gap-10">
                                        ({{$product['reviews_count']}} {{translate('reviews')}})
                                    </span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="text-center">
            <p class="text-muted">{{translate('no_Top_Selling_Products')}}</p>
            <img class="w-75" src="{{asset('assets/back-end/img/no-data.png')}}" alt="">
        </div>
    @endif
</div>
