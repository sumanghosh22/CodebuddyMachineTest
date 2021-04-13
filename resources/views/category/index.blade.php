@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
									<div class="alert alert-success alert-block">
										<button type="button" class="close" data-dismiss="alert">×</button>	
									        <strong>{{ $message }}</strong>
									</div>
								@endif
<table class="table">
<a href="{{route('category.list.add')}}"><button class="btn btn-success">Add Categrory</button></a>

  <thead>
    <tr>
     
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($categories as $category)
    <tr>
      
      <td>{{$category->name}}</td>
      <td>
      <a href="{{route('category.edit',$category->id)}}"><button class="btn btn-success">Edit</button></a>
      <a href="{{route('category.delete',$category->id)}}" onclick="return confirm('Are you sure you want to delete this item?');"><button class="btn btn-danger">Delete</button></a>
      <a href="{{route('product.add',$category->id)}}"><button class="btn btn-success">Add Product</button></a>
      </td>
     
    
    </tr>
    @endforeach
    
  </tbody>
</table>
@endsection