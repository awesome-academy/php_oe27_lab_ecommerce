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
                        <h4 class="title">{{ trans('setting.cake.title') }}</h4>
                        <a href="{{ route('cake.create') }}">
                            <button type="submit" class="btn btn-danger">{{ trans('setting.cake.add_product') }}</button>
                        </a>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>{{ trans('setting.cake.id') }}</th>
                            <th>{{ trans('setting.cake.name') }}</th>
                            <th>{{ trans('setting.cake.quanity') }}</th>
                            <th>{{ trans('setting.cake.price') }}</th>
                            <th>{{ trans('setting.cake.price_sale') }}</th>
                            <th>{{ trans('setting.cake.img') }}</th>
                            <th>{{ trans('setting.cake.status') }}</th>
                            <th>{{ trans('setting.cake.category') }}</th>
                            <th>{{ trans('setting.action') }}</th>
                            </thead>
                            <tbody>
                            @foreach ($cake as $ca )
                                <tr>
                                    <td>{{ $ca->id }}</td>
                                    <td id="user-{{ $ca['id'] }}-name">{{ $ca->name }}</td>
                                    <td>{{ $ca->quanity }}</td>
                                    <td>{{ $ca->price }}</td>
                                    <td>{{ $ca->price_sale }}</td>
                                    <td><img src="{{ asset('upload/user/'. $ca->images->first()->image) }}" alt=""
                                             height="50px" width="100px"></td>
                                    <td>{{ $ca->status }}</td>
                                    <td>{{ $ca->category->name }}</td>
                                    <td class="option">
                                        <a href="{{ route('cake.edit', $ca->id) }}">
                                            <button class="font-icon-detail" type="button">
                                                <i class="pe-7s-pen"></i>
                                                {{ trans('setting.edit') }}
                                            </button>
                                        </a>
                                        <button class="font-icon-detail" data-id="{{ $ca->id }}" type="button"
                                                onclick="deleteCake(this);">
                                            <i class="pe-7s-trash"></i>
                                            {{ trans('setting.delete') }}
                                        </button>
                                        <form class="form-{{ $ca->id }}" action="{{ route('cake.destroy', $ca->id) }}"
                                              method="POST" style="display: none">
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

