@extends('layouts.app')

@section('content')
<div class="container">     
		<div class="panel panel-primary">
			<div class="panel-heading">Manage Category TreeView</div>
	  		<div class="panel-body">
	  			<div class="row">
	  			
	  				<div class="col-md-6">
	  					<h3> Edit Category</h3>


				  		
                              <form action="{{route('update.category',$categoryDetails->id)}}" method="post">

                                @csrf
				  				@if ($message = Session::get('success'))
									<div class="alert alert-success alert-block">
										<button type="button" class="close" data-dismiss="alert">×</button>	
									        <strong>{{ $message }}</strong>
									</div>
								@endif


				  				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
									{!! Form::label('name:') !!}
									
                                    <input type="text" placeholder="Eneter Name" value="{{$categoryDetails->name}}" class="form-control" name="name" >
									<span class="text-danger">{{ $errors->first('name') }}</span>
								</div>


								<div class="form-group {{ $errors->has('parent_category_id') ? 'has-error' : '' }}">
									{!! Form::label('Category:') !!}
									
                                    <select class="form-control" name="parent_category_id">
                                    <option value="">Select Category</option>
                                    @foreach($allCategories as $category)
                                    <option value="{{$category->id}}" @if($category->id == $categoryDetails->parent_category_id) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                    </select>
									<span class="text-danger">{{ $errors->first('parent_category_id') }}</span>
								</div>


								<div class="form-group">
									<button class="btn btn-success">Update</button>
								</div>


				  			</form>


	  				</div>
					  <a href="{{route('category.list')}}"><button class="btn btn-success">Category List</button></a>
	  			</div>

	  			
	  		</div>
        </div>
    </div>
    <script src="/js/treeview.js"></script>
@endsection