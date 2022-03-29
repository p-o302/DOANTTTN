@extends('layouts.app')
@section('content')
    <div class="col-md-10">
        @if (session('flash_message'))
            <div class="alert alert-success">{{ session('flash_message') }}</div>
        @endif
        <div class="card-header">Quản lý danh mục</div>
        <a href="{{ route('category.create') }}" class="btn btn-success">Thêm mới</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Active/Inactive</th>
                    <th scope="col">Manage</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $key => $cate)
                    <tr>
                        <th scope="row">{{ $key }}</th>
                        <td>{{ $cate->title }}</td>
                        <td>{{ $cate->description }}</td>
                        <td>{{ $cate->slug }}</td>
                        <td>
                            @if ($cate->status)
                                Hiển thị
                            @else
                                Không hiển thị
                            @endif
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $cate->id], 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                            {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                            <a href="{{ route('category.edit', $cate->id) }}" class="btn btn-primary">Sửa</a>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
