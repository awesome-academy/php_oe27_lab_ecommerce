@extends('admin.layouts.master');
@section('content');
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                {{ $err }}<br>
                            @endforeach
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="header">
                        <h4 class="title">{{ trans('setting.title1_cat') }}</h4>
                        <a href="{{ route('category.create') }}"><button type="submit" class="btn btn-danger">{{ trans('setting.add_cat') }}</button></a>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Parent</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            </thead>
                            <tbody>
                            @foreach ($category as $cate )
                                <tr>
                                    <td>{{ $cate->id }}</td>
                                    <td id="cate-{{ $cate['id'] }}-name">{{ $cate->name }}</td>
                                    <td>{{ $cate->parent_id }}</td>
                                    <td>{{ date_format($cate->created_at, 'd-m-Y') }}</td>
                                    <td>{{ date_format($cate->updated_at, 'd-m-Y') }}</td>
                                    <td class="option">
                                        <a href="{{ route('category.edit', $cate->id) }}">
                                            <button class="font-icon-detail" type="button">
                                                <i class="pe-7s-pen"></i>
                                                {{ trans('setting.edit') }}
                                            </button>
                                        </a>
                                        <button class="font-icon-detail" data-id="{{ $cate->id }}" type="button" onclick="deleteCategory(this);">
                                            <i class="pe-7s-trash"></i>
                                            {{ trans('setting.delete') }}
                                        </button>
                                        <form class="form-{{ $cate->id }}" action="{{ route('category.destroy', $cate->id) }}" method="POST" style="display: none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

