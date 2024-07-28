@php
use Illuminate\Support\Facades\Session;
@endphp

@extends('layouts.app')

@section('main')
    @if($message=Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{$message}}</strong>
        </div>
    @endif

    <div class="container">
      <div class="row justify-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3">
            <form method="post" action="/products/{{$product->id}}/update" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name',$product->name)}}">
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name')}}</span>
                            @endif
                            <br />

                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" >{{old('description',$product->description)}}</textarea>
                    @if($errors->has('description')) <span class="text-danger">{{ $errors->first('description')}}</span>
                    @endif
                    <br />

                    <label for="image">Image:</label>
                    <input type="file" class="form-control-file" id="image" name="image" value="{{old('image',$product->image)}}" >
                    @if($errors->has('image')) <span class="text-danger">{{ $errors->first('image')}}</span>
                    @endif
                    <br />

                </div>
                <button type="submit" class="btn btn-dark mt-2" >Submit</button>
            </form>
            </div>
      </div>
    </div>
@endsection