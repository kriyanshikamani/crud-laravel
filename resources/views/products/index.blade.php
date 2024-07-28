@extends('layouts.app')

@section('main')
  
  <div class="container">
    <div class="text-right">
      <a class="btn btn-dark mt-2 " href="products/create">Add new Product</a>
    </div>
  </div>

  <table class="table table-hover mt-2">
    <thead>
      <tr>
        <th scope="col">Sr. No</th>
        <th scope="col">Name</th>
        <th scope="col">Discription</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)  
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td><img src="product_images/{{$product->image}}" class="rounded" height="50" width="50"> </td>
        <td >
          <a href="products/{{$product->id}}/edit" class="btn btn-dark">Edit</a> 
          <a href="products/{{$product->id}}/delete" class="btn btn-danger">Delete</a> 
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
<@endsection