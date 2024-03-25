<div class="card-header">
    <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0">
        <img src="{{asset('/assets/back-end/img/top-customers.png')}}" alt="">
        {{translate('top_Delivery_Man')}}
    </h4>
</div>

<div class="card-body">
    @if($topRatedDeliveryMan)
        <div class="grid-card-wrap">
            @foreach($topRatedDeliveryMan as $key=> $deliveryMan)
                @if(isset($deliveryMan['id']))
                    <div class="cursor-pointer">
                        <div class="grid-card basic-box-shadow">
                            <div class="text-center">
                                <img class="avatar rounded-circle avatar-lg get-view-by-onclick" alt=""
                                     src="{{ getValidImage(path: 'storage/app/public/delivery-man/'.$deliveryMan['image']??'',type:'backend-profile') }}"
                                     data-link="{{ route('admin.delivery-man.earning-statement-overview',[$deliveryMan['id']]) }}">
                            </div>

                            <h5 class="mb-0 get-view-by-onclick" data-link="{{ route('admin.delivery-man.earning-statement-overview',[$deliveryMan['id']]) }}">
                                {{Str::limit($deliveryMan['f_name'], 15)}}
                            </h5>

                            <div class="orders-count d-flex gap-1">
                                <div>{{translate('delivered')}} :</div>
                                <div>{{$deliveryMan['orders_count']}}</div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @else
        <div class="text-center">
            <p class="text-muted">{{translate('no_Top_Selling_Products')}}</p>
            <img class="w-75" src="{{asset('/assets/back-end/img/no-data.png')}}" alt="">
        </div>
    @endif
</div>
