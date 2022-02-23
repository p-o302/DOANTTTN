@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản lý thể loại</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($genre))
                            {!! Form::open(['route' => 'genre.store', 'method' => 'POST']) !!}
                        @else  
                            {!! Form::open(['route' => ['genre.update', $genre->id], 'method' => 'PUT']) !!}
                        @endif
                        {{-- {!! Form::open(['route' => 'genre.store', 'method' => 'POST']) !!} --}}
                        {{-- sẽ render ra luôn form có method là POST
                        - ko cần phải @csrf, hàm này sẽ cho luôn _token của trang --}}
                        <div class="form-group">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($genre) ? $genre->title : '', ['class' => 'form-control', 'placeholder' => 'Nhập...', 'id' => 'slug', 'onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', isset($genre) ? $genre->slug : '', ['class' => 'form-control', 'placeholder' => 'Nhập...', 'id' => 'convert_slug']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', []) !!}
                            {!! Form::textarea('description', isset($genre) ? $genre->description : '', ['style' => 'resize:none', 'class' => 'form-control', 'placeholder' => 'Nhập...', 'id' => 'description']) !!}
                        </div>
                        <div class="form-group">
                            
                            {!! Form::label('active', 'Active', []) !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Ẩn'],isset($genre) ? $genre->status : null, ['class' => 'form-control']) !!}
                        </div>

                        @if (empty($genre))
                            {!! Form::submit('Them du lieu', ['class' => 'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cap nhat', ['class' => 'btn btn-success']) !!}

                        @endif    

                        {!! Form::close() !!}
                    </div>

                </div>
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
                                    {!! Form::open(['method' => 'DELETE','route' => ['genre.destroy', $cate->id], 'onsubmit'=>'return confirm("Are you sure?")']) !!}
                                      {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                                      <a href="{{route('genre.edit', $cate->id)}}" class="btn btn-primary">Sửa</a>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <style>
        .form-group {
            margin-bottom: 10px;
        }

    </style>
@endsection
