@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quản lý admin</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                         
                    Welcom to admin page
                </div>
            </div>
        </div>
    </div>
</div>
<style>
  .navbar-brand{
    /* width: 100%; */
  }
</style>
@endsection
