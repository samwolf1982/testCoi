@extends('layout.main')
@section('content')
    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content bg padding-y-sm">

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3-24"><strong>Your are here:</strong></div> <!-- col.// -->
                        <nav class="col-md-18-24">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Goods for sale</li>
                            </ol>
                        </nav> <!-- col.// -->
                        <div class="col-md-3-24 text-right">
                            <a href="{{ route('goods.create') }}">
                                <button data-toggle="tooltip" title="add" type="button" class="btn btn-success">add <i
                                            class='fas fa-plus'></i></button>
                            </a>

                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card.// -->


        <div class="container">
            <div class="padding-y-sm">
                <span>{{$productsTotal}} results for "Item"</span>
            </div>
            <div class="row-sm ">
                @foreach($products as $product)
                    <div class="col-md-4 col-sm-6">
                        <figure class="card card-product">
                            <div class="img-wrap"><img src="{{$product->firstImage()}}" alt="{{$product->name}}"></div>
                            <figcaption class="info-wrap">
                                <a href="#" class="title">{{$product->name}}</a>
                                <div class="price-wrap">
                                    <span class="price-new">{{HtmlHelpers::getActiveCurrencyCode()}}{{$product->priceByCode(Cookie::get('currency_code'))}}</span>
                                </div> <!-- price-wrap.// -->
                            </figcaption>
                            <div class="d-flex flex-row-reverse bd-highlight ">
                                {!! Form::open(['id'=>'form-product_'.$product->id,'url'=>'goods/'.$product->id,'enctype'=>"multipart/form-data"]) !!}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger m-2" type="submit"><i class="icon-edit"></i> Delete</button>
                                {!! Form::close() !!}
                                <a class="btn btn-info m-2" href="{{ route('goods.edit',$product->id) }}"><i class="icon-edit"></i> &nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</a>
                            </div>

                        </figure> <!-- card // -->
                    </div> <!-- col // -->
                @endforeach
                <br>

            </div> <!-- row.// -->
            <div class="row-sm flex"  style="justify-content: flex-end;">
                {{ $products->links("pagination::bootstrap-4") }}
            </div>

        </div><!-- container // -->
    </section>
    <!-- ========================= SECTION CONTENT .END// ========================= -->
@endsection
