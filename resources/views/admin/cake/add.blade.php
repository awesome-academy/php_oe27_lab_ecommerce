@extends('admin.layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="header">
                        <h4 class="title">{{ trans('setting.cake.add_product') }}</h4>
                    </div>
                    <div class="content">
                        @if (count($errors) > config('setting.zero'))
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $err)
                                    {{ $err }}<br>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('cake.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>{{ trans('setting.cake.name') }}</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{ trans('setting.cake.status') }}</label>
                                        <input type="text" class="form-control" name="status">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('setting.cake.quanity') }}</label>
                                        <input type="text" class="form-control" name="quanity">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ trans('setting.cake.price') }}</label>
                                        <input type="text" class="form-control" name="price">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ trans('setting.cake.price_sale') }}</label>
                                        <input type="text" class="form-control" name="price_sale">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>{{ trans('setting.cake.category') }}</label>
                                    <select class="select2 form-control custom-select" name="category_id" required>
                                        <option>{{ trans('setting.cake.title1') }}</option>
                                        @foreach ($categories as $cate)
                                            <option value="{{ $cate->id }}">{{ $cate->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div/>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ trans('setting.cake.description') }}</label>
                                            <textarea class="ckeditor" name="description" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">{{ trans('setting.cake.add_product') }}</h4>
                                </div>
                                <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="content">
                                        @for($i =1 ;$i<=3 ;$i++)
                                            <div class="form-group">
                                                <label>Image {{ $i }}</label>
                                                <input type="file" class="form-control" name="image[]"/>
                                            </div>
                                        @endfor
                                    </div>
                                </form>
                            </div>
                            <button type="submit"
                                    class="btn btn-info btn-fill pull-right">{{ trans('setting.submit') }}</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
