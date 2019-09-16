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
                            <h3 class="panel-title"><i class="fa fa-pencil"></i>Create product</h3>
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
                            {!! Form::open(['id'=>'form-product','url'=>'goods','enctype'=>"multipart/form-data"]) !!}
                            <ul class="nav nav-tabs nav-pills flex-column flex-sm-row">

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-general">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="language1">
                                            <div class="form-group required pt-2">
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
                                                                   value="{{old('amount') , 0.01}}"
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

                                                    <div class="col-sm-4">
                                                        <label for="profile_image" class="col-sm-2 control-label">Images</label>
                                                        <div class="form-group">
                                                            <input type="file" name="images[]" id="images" type="file" class="form-control" class="form-control" accept=".jpg, .jpeg, .png" multiple />
                                                            @if ($errors->first('images.0'))
                                                                <div class="alert alert-warning p-0" role="alert">
                                                                    {{$errors->first('images.0')}}
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
                                                                  rows="10">{{old('description')}}</textarea>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div> <!-- row.// -->


        </div><!-- container // -->
    </section>
    <!-- ========================= SECTION CONTENT .END// ========================= -->
@endsection
