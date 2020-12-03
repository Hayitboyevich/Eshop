@extends('admin.admin_layout')
@section('content')

<div class="row row-sm">
	<div class="col-md-8 m-auto">
		<div class="card">
			<div class="card-header">
			Edit Brand
			</div>
		  <div class="card-body">
			<form action="{{route('brand.update', ['id'=>$brand->id])}}" method="post">
				@csrf
			    <div class="form-group">
			      <label for="brand_name">Category Name:</label>
			      <input type="brand_name" class="form-control" id="brand_name"  name="brand_name" value="{{$brand->brand_name}}">
			    </div>
			   
			    <div class="form-group form-check">
			      <label class="form-check-label">
			        <input class="form-check-input" type="checkbox" name="status" {{ $brand->status == 1 ? 'checked' : ''}} value="{{old('status') ?? $brand->status ?? 0}}">
			      </label>
			    </div>
			    <button type="submit" class="btn btn-primary">Submit</button>
			  </form>
		  </div>
		</div>
		</div>
		
	</div>


@endsection