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
                                <li class="breadcrumb-item"><a href="{{ route('goods') }}">Goods for sale</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                            </ol>
                        </nav> <!-- col.// -->
                        <div class="col-md-3-24 text-right">

                            <button form="form-product" data-toggle="tooltip" title="add" type="submit"
                                    class="btn btn-success">Save <i
                                        class='fas fa-plus'></i></button>

                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card.// -->


        <div class="container">
            <div class="padding-y-sm">

            </div>

            <div class="row-sm">
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title mb-3"><i class="fa fa-pencil"></i>Edit/Create</h3>
                        </div>


                        @if(0)
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br/>
                            @endif
                        @endif


                        <div class="panel-body">
                            {!! Form::open(['id'=>'form-product','url'=>'goods/'.$productModel->id,'enctype'=>"multipart/form-data"]) !!}
                            {{ method_field('PUT') }}
                            <ul class="nav nav-tabs nav-pills flex-column flex-sm-row pull-right  mb-3">
                                <li class="nav-item">
                                    <a class="nav-link active" id="a" data-toggle="pill" href="#tab-general"
                                       role="tab" aria-controls="pills-home" aria-selected="true">Total</a>
                                </li>
                                <li class="nav-item hidden">
                                    <a class="nav-link" id="b" data-toggle="pill" href="#tab-image" role="tab"
                                       aria-controls="pills-profile" aria-selected="false">Images</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-general">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="language1">
                                            <div class="form-group required">
                                                <label class="col-sm-2 control-label" for="name">Product
                                                    name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name"
                                                           value="{{old('name',$productModel->name)}}"
                                                           placeholder="Product name" id="name"
                                                           class="form-control">
                                                    @if ($errors->first('name'))
                                                        <div class="alert alert-warning p-0" role="alert">
                                                            {{$errors->first('name')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group required">
                                                <div class="row pl-4">
                                                    <div class="col-sm-2">
                                                        <label class="col-sm-2 control-label"
                                                               for="amount">Price</label>
                                                        <div class="form-group">
                                                            <input type="text" name="amount" id="amount"
                                                                   value="{{$productModel->price->uah}}"
                                                                   class="form-control">
                                                            @if ($errors->first('amount'))
                                                                <div class="alert alert-warning p-0" role="alert">
                                                                    {{$errors->first('amount')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-2">
                                                        <label class="col-sm-2 control-label"
                                                               for="status">Status</label>
                                                        <div class="form-group">
                                                            <select class="form-control" name="status"
                                                                    id="status">
                                                                <option value="1"
                                                                        @if (old('status') == '1') selected="selected" @endif>
                                                                    On
                                                                </option>
                                                                <option value="0"
                                                                        @if (old('status') == '0') selected="selected" @endif>
                                                                    Off
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label class="col-sm-2 control-label"
                                                               for="sort">Sort</label>
                                                        <div class="form-group">
                                                            <input type="text" id="sort" name="sort"
                                                                   value="{{old('sort',$productModel->sort)}}"
                                                                   class="form-control">
                                                            @if ($errors->first('sort'))
                                                                <div class="alert alert-warning p-0" role="alert">
                                                                    {{$errors->first('sort')}}
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>





                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="description">Product
                                                    description</label>
                                                <div class="col-sm-10">
                                                        <textarea name="description"
                                                                  class="form-control summernote"
                                                                  id="description" cols="30"
                                                                  rows="10">{{$productModel->description}}</textarea>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane hidden " id="tab-image" >
                                    <div class="">
                                        <div class="form-group row">
                                            <label for="profile_image" class="col-md-4 col-form-label text-md-right">Add images</label>
                                            <div class="col-md-6">
                                                <input type="file" name="images[]" id="images" type="file" class="form-control" class="form-control" accept=".jpg, .jpeg, .png" multiple />
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                    <div class="table-responsive">
                                        <table id="images" class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <td class="text-left"></td>
                                                <td class="text-right">Sort</td>
                                                <td></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($productModel->images as $image)
                                                <tr id="image-row{{$image->id}}">
                                                    <td class="text-left">
                                                        <a href="#" class="thumbnail">
                                                            <img src="{{$image->name}}" class="rounded float-left img-responsive" style="max-height: 150px;" alt="...">
                                                        </a>


                                                    </td>
                                                    <td class="text-right"><input type="text"
                                                                                  name="product_image[0][sort_order]"
                                                                                  value="0"
                                                                                  placeholder="Порядок сортировки"
                                                                                  class="form-control"></td>
                                                    <td class="text-left">

                                                        {!! Form::open(['id'=>'form-images_'.$image->id,'url'=>'goods/images/'.$image->id,'enctype'=>"multipart/form-data"]) !!}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit"  onclick="$('#image-row0').remove();"
                                                                data-toggle="tooltip" title="" class="btn btn-danger"
                                                                data-original-title="Удалить"><i
                                                                    class="fa fa-minus-circle"></i>

                                                        </button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td class="text-left">
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div> <!-- row.// -->


        </div><!-- container // -->
    </section>
    <!-- ========================= SECTION CONTENT .END// ========================= -->
@endsection
