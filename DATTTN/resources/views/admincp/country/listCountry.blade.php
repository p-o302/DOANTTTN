@extends('layouts.app')
@section('content')
    {{-- <div class="row justify-content-center"> --}}
    <div class="col-md-10">
        {{-- <div class="card"> --}}
        <div class="card-header">Quản lý quốc gia</div>
        <a href="{{ route('country.create') }}" class="btn btn-success">Thêm mới</a>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
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
                                {!! Form::open(['method' => 'DELETE', 'route' => ['country.destroy', $cate->id], 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                                {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                <a href="{{ route('country.edit', $cate->id) }}" class="btn btn-primary">Sửa</a>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
