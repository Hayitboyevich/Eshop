@extends('admin.admin_layout')
@section('brand')
active
@endsection
@section('content')

<div class="row">
	<div class="col-md-8">
		<div class="card">

		  <div class="card-body">
			<div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Name</th>
                  <th class="wd-20p">Status</th>
                  <th class="wd-15p">Action</th>
                </tr>
              </thead>
              <tbody>
              	@php
              		$i=1;
              	@endphp
              	@foreach($brands as $brand)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{$brand->brand_name}}</td>
                  <td>
                  @if($brand->status==1)
                  	<span class="badge badge-success">Active</span>
                  @else
                  	<span class="badge badge-danger">Unactive</span>
                  @endif
                  </td>
                  <td>
                  	@if($brand->status==1)
                  	<a href="{{route('brand.unactive', ['id'=>$brand->id])}}" class="btn btn-warning btn-sm">
                  	 	<i class="fa fa-arrow-down"></i>
                  	 </a>
                  	 @else
                  	 <a href="{{route('brand.active', ['id'=>$brand->id])}}" class="btn btn-info btn-sm">
                  	 	<i class="fa fa-arrow-up"></i>
                  	 </a>
                  	 @endif
                  	<a class="btn btn-success btn-sm" href="{{route('brand.edit', ['id'=>$brand->id])}}">
                  		<i class="fa fa-pencil"></i>
                  	</a>
                  	 <a class="btn btn-sm btn-danger" href="{{route('brand.delete', ['id'=>$brand->id])}}">
                  	 	<i class="fa fa-trash"></i>
                  	 </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
		  </div>
		</div>
		
	</div>
	<div class="col-md-4">
	   <div class="card" style="width: 18rem;">
			<div class="card-header">
				<h2>Create Brand</h2>
			</div>			
		  <div class="card-body">
		  	<form action="{{route('brand.store')}}" method="post">
		  		@csrf
			  	<div class="form-group">
			  		<label class="sr-only" for="brand_name">Name</label>
				  	<input type="text" class="form-control" name="brand_name" id="brand_name">	
			  	</div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		  </div>
		</div>
	</div>
</div>

@endsection