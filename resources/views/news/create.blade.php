@extends('layout')

@section('content')

<div class="container">
    <form action="{{ url('/create') }}" method="post">
        @csrf

        <div class="row">

            <div class="col-lg-12 my-2">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ url('/index') }}"> Back</a>
                </div>
            </div>
        </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li class="list-unstyled">{{ $error }}</li>
                    @endforeach
            </div>
                @endif

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Active:</strong>
                    <input type="checkbox" name="active" id="active" value="1" checked>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>
</div>

@endsection
