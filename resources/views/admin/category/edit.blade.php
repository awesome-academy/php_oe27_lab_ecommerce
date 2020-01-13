@extends('admin.layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">{{ trans('setting.title_add_cat') }}</h4>
                        </div>
                        <div class="content">
                            @if (count($errors) > config('setting.zero'))
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $err)
                                        {{ $err }}<br>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>{{ trans('setting.add_cat') }}</label>
                                            <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ trans('setting.parent_add') }}</label>
                                            <input type="text" class="form-control" name="parent_id" value="{{ $category->parent_id }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">{{ trans('setting.submit') }}</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
