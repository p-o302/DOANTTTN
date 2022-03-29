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

            </div>
        </div>
    </div>
    <style>
        .form-group {
            margin-bottom: 10px;
        }

    </style>
@endsection
