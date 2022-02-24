@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản lý Phim</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($movie))
                            {!! Form::open(['route' => 'movie.store', 'method' => 'POST','enctype'=> 'multipart/form-data']) !!}
                        @else  
                            {!! Form::open(['route' => ['movie.update', $movie->id], 'method' => 'PUT','enctype'=> 'multipart/form-data']) !!}
                        @endif
                        {{-- {!! Form::open(['route' => 'movie.store', 'method' => 'POST']) !!} --}}
                        {{-- sẽ render ra luôn form có method là POST
                        - ko cần phải @csrf, hàm này sẽ cho luôn _token của trang --}}
                        <div class="form-group">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($movie) ? $movie->title : '', ['class' => 'form-control', 'placeholder' => 'Nhập...', 'id' => 'slug', 'onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', isset($movie) ? $movie->slug : '', ['class' => 'form-control', 'placeholder' => 'Nhập...', 'id' => 'convert_slug']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', []) !!}
                            {!! Form::textarea('description', isset($movie) ? $movie->description : '', ['style' => 'resize:none', 'class' => 'form-control', 'placeholder' => 'Nhập...', 'id' => 'description']) !!}
                        </div>
                        <div class="form-group">
                            
                            {!! Form::label('active', 'Active', []) !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Ẩn'],isset($movie) ? $movie->status : null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Category', 'Category', []) !!}
                            {!! Form::select('category_id', $category,isset($movie) ? $movie->category : '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Country', 'Country', []) !!}
                            {!! Form::select('country_id',$country, isset($movie) ? $movie->country : '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Genre', 'Genre', []) !!}
                            {!! Form::select('genre_id',$genre, isset($movie) ? $movie->genre : '', ['class' => 'form-control']) !!}
                        </div>  
                        <div class="form-group">
                            {!! Form::label('Image', 'Image', []) !!} <br>
                            {!! Form::file('image', ['class'=>'form-control-file']) !!}
                        </div> 

                        @if (empty($movie))
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
                            <th scope="col">Image</th>
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
                                <td> <img src="{{asset('uploads/movie/'.$cate->image)}}" alt="mangcui" srcset="" style="width: 150px; height: 150px;"></td>
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
                                    {!! Form::open(['method' => 'DELETE','route' => ['movie.destroy', $cate->id], 'onsubmit'=>'return confirm("Are you sure?")']) !!}
                                      {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                                      <a href="{{route('movie.edit', $cate->id)}}" class="btn btn-primary">Sửa</a>
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