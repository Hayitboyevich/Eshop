@extends('admin.admin_layout')
@section('content')

<div class="row row-sm">
	<div class="col-md-8 m-auto">
		<div class="card">
			<div class="card-header">
			Edit Ctegory
			</div>
		  <div class="card-body">
			<form action="{{route('category.update', ['id'=>$category->id])}}" method="post">
				@csrf
			    <div class="form-group">
			      <label for="category_name">Category Name:</label>
			      <input type="category_name" class="form-control" id="category_name"  name="category_name" value="{{$category->category_name}}">
			    </div>
			   
			    <div class="form-group form-check">
			      <label class="form-check-label">
			        <input class="form-check-input" type="checkbox" name="status" {{ $category->status == 1 ? 'checked' : ''}} value="{{old('status') ?? $category->status ?? 0}}">
			      </label>
			    </div>
			    <button type="submit" class="btn btn-primary">Submit</button>
			  </form>
		  </div>
		</div>
		</div>
		
	</div>


@endsection