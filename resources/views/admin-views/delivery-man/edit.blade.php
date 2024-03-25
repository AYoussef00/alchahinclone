@extends('layouts.back-end.app')

@section('title', translate('update_delivery_man'))

@push('css_or_js')

@endpush

@section('content')
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="{{asset('/assets/back-end/img/deliveryman.png')}}" width="20" alt="">
                {{translate('update_Deliveryman')}}
            </h2>
        </div>

        <div class="row">
            <div class="col-12 mb-3">
                <form action="{{route('admin.delivery-man.update',[$deliveryMan['id']])}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-0 page-header-title d-flex align-items-center gap-2 border-bottom pb-3 mb-3">
                                <i class="tio-user"></i>
                                {{translate('general_Information')}}
                            </h5>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label
                                            class="title-color d-flex">{{translate('first_Name')}}</label>
                                        <input type="text" value="{{$deliveryMan['f_name']}}" name="f_name"
                                               class="form-control"
                                               placeholder="{{translate('new_delivery_man')}}"
                                               required>
                                    </div>

                                    <div class="form-group">
                                        <label
                                            class="title-color d-flex">{{translate('last_Name')}}</label>
                                        <input type="text" value="{{$deliveryMan['l_name']}}" name="l_name"
                                               class="form-control" placeholder="{{translate('last_Name')}}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label class="title-color d-flex"
                                               for="exampleFormControlInput1">{{translate('phone')}}</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <select
                                                    class="js-example-basic-multiple js-states js-example-responsive form-control"
                                                    name="country_code" id="colors-selector" required>
                                                    @foreach($telephoneCodes as $code)
                                                        <option
                                                            value="{{ $code['code'] }}" {{ $code['code']== $deliveryMan['country_code']? 'selected' : '' }}>{{ $code['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="text" name="phone" value="{{$deliveryMan['phone']}}"
                                                   class="form-control"
                                                   placeholder="{{translate('ex')}} : 017********"
                                                   required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label
                                            class="title-color d-flex">{{translate('identity_Type')}}</label>
                                        <select name="identity_type" class="form-control">
                                            <option
                                                value="passport" {{$deliveryMan['identity_type']=='passport'?'selected':''}}>
                                                {{translate('passport')}}
                                            </option>
                                            <option
                                                value="driving_license" {{$deliveryMan['identity_type']=='driving_license'?'selected':''}}>
                                                {{translate('driving_License')}}
                                            </option>
                                            <option
                                                value="nid" {{$deliveryMan['identity_type']=='nid'?'selected':''}}>{{translate('nid')}}
                                            </option>
                                            <option
                                                value="company_id" {{$deliveryMan['identity_type']=='company_id'?'selected':''}}>
                                                {{translate('company_ID')}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            class="title-color d-flex">{{translate('identity_Number')}}</label>
                                        <input type="text" name="identity_number"
                                               value="{{$deliveryMan['identity_number']}}"
                                               class="form-control"
                                               placeholder="{{translate('ex')}} : DH-23434-LS"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label class="title-color d-flex">{{translate('address')}}</label>
                                        <textarea name="address" class="form-control" id="address" rows="1"
                                                  placeholder="Address">{{$deliveryMan['address']}}</textarea>
                                    </div>


                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="d-flex mb-2 gap-2 align-items-center">
                                            <label
                                                class="title-color mb-0">{{translate('deliveryman_image')}}</label>
                                            <span class="text-info">* ( {{translate('ratio')}} 1:1 )</span>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" id="customFileEg1"
                                                       class="custom-file-input"
                                                       accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                                <label class="custom-file-label"
                                                       for="customFileEg1">{{translate('choose_File')}}</label>
                                            </div>
                                        </div>
                                        <div class="mt-4 text-center">
                                            <img class="upload-img-view" id="viewer"
                                                 src="{{ getValidImage(path: 'storage/app/public/delivery-man/'.$deliveryMan['image'], type: 'backend-profile') }}"
                                                 alt=""/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label
                                            class="title-color d-flex">{{translate('identity_image')}}</label>
                                        <div>
                                            <div class="row" id="coba">
                                                @if($deliveryMan['identity_image'])
                                                    @foreach(json_decode($deliveryMan['identity_image'],true) as $img)
                                                        <div class="col-md-4 mb-3">
                                                            <img height="150" alt=""
                                                                 src="{{getValidImage(path: 'storage/app/public/delivery-man/'.$img,type:'backend-basic')}}">
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <!-- End Page Header -->
                        <div class="card-body">
                            <h5 class="mb-0 page-header-title d-flex align-items-center gap-2 border-bottom pb-3 mb-3">
                                <i class="tio-user"></i>
                                {{translate('account_Information')}}
                            </h5>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="title-color d-flex">{{translate('email')}}</label>
                                        <input type="email" value="{{$deliveryMan['email']}}" name="email"
                                               class="form-control"
                                               placeholder="{{translate('ex')}} : email@example.com"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="title-color d-flex">{{translate('password')}}</label>
                                        <input type="text" name="password" class="form-control"
                                               placeholder="{{translate('ex')}} : {{translate('password')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label
                                            class="title-color d-flex">{{translate('confirm_password')}}</label>
                                        <input type="text" name="confirm_password" class="form-control"
                                               placeholder="{{translate('ex')}} : {{translate('password')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-3 justify-content-end">
                                <button type="reset" id="reset"
                                        class="btn btn-secondary px-4">{{translate('reset')}}</button>
                                <button type="submit"
                                        class="btn btn--primary px-4">{{translate('submit')}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <span id="coba-image" data-url="{{asset("assets/back-end/img/400x400/img2.jpg")}}"></span>
    <span id="extension-error" data-text="{{ translate("please_only_input_png_or_jpg_type_file") }}"></span>
    <span id="size-error" data-text="{{ translate("file_size_too_big") }}"></span>
@endsection

@push('script_2')
    <script src="{{asset('assets/back-end/js/spartan-multi-image-picker.js')}}"></script>
    <script src="{{asset('assets/back-end/js/admin/deliveryman.js')}}"></script>
@endpush
