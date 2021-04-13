@extends('layouts.app')

@section('content')
<div class="container">     
		<div class="panel panel-primary">
			<div class="panel-heading">Product Add</div>
	  		<div class="panel-body">
	  			<div class="row">
	  				
	  				<div class="col-md-12">
	  					<h3>Add New Product</h3>


				  			{!! Form::open(['route'=>'save.product']) !!}


				  				@if ($message = Session::get('success'))
									<div class="alert alert-success alert-block">
										<button type="button" class="close" data-dismiss="alert">×</button>	
									        <strong>{{ $message }}</strong>
									</div>
								@endif


				  				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
									{!! Form::label('name:') !!}
									{!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter name']) !!}
									<span class="text-danger">{{ $errors->first('name') }}</span>
								</div> 


								<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
									{!! Form::label('Category:') !!}
									<select class="form-control" name="category_id">
                                    <option value="">Select Category</option>
                                    @foreach($allCategories as $category)
                                    <option value="{{$category->id}}" @if($category->id == $selectedCcategory) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                    </select>
									<span class="text-danger">{{ $errors->first('category_id') }}</span>
								</div>


								<div class="form-group">
									<button class="btn btn-success">Add New</button>
								</div>


				  			{!! Form::close() !!}


	  				</div>
					  <a href="{{route('category.list')}}"><button class="btn btn-success">Category List</button></a>
	  			</div>

	  			
	  		</div>
        </div>
    </div>
    <script src="/js/treeview.js"></script>
@endsection