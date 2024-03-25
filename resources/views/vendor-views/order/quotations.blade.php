@extends('layouts.back-end.app-seller')

@section('title', translate('customer_quotations'))

@section('content')
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex gap-2 align-items-center">
                <img width="20" src="{{asset('/public/assets/back-end/img/customer_review.png')}}" alt="">
                {{translate('customer_quotations')}}
            </h2>
        </div>

        
        <div class="card mt-20">
            <div class="table-responsive datatable-custom">
                <table
                        class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100"
                        style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }}">
                    <thead class="thead-light thead-50 text-capitalize">
                    <tr>
                        <th>{{ translate('SL') }}</th>
                        <th>{{ translate('product') }}</th>
                        <th>{{ translate('customer') }}</th>
                        <th>{{ translate('date') }}</th>
                        <th>{{ translate('quotation file') }}</th>
                  
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($reviews as $key => $review)
                        <tr>
                            <td>
                                {{ $reviews->firstItem()+$key }}
                            </td>
                            <td>
                                @if(isset($review->product))
                                    <a href="{{$review['product_id'] ? route('vendor.products.view', [$review['product_id']]) : 'javascript:'}}"
                                       class="title-color hover-c1">
                                        {{ Str::limit($review->product['name'], 100) }}
                                    </a>
                                @else
                                    <span class="title-color">
                                        {{ translate('product_not_found') }}
                                    </span>
                                @endif

                            </td>
                            <td>
                                @if ($review->user)
                                     {{ $review->user->f_name . ' ' . $review->user->l_name }}
                                @else
                                    <label class="badge badge-soft-danger">{{ translate('customer_removed') }}</label>
                                @endif
                            </td>
                         
                            <td>{{ date('d M Y', strtotime($review->created_at)) }}</td>
                            
                            <td>
                                <a href="" class="btn btn-success" > upload PDF  </a>
                            </td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="table-responsive mt-4">
                <div class="px-4 d-flex justify-content-lg-end">
                    {!! $reviews->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

