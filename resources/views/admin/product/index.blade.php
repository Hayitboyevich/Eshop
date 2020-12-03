@extends('admin.admin_layout')
@section('product') active show-sub @endsection
@section('all-product') active @endsection

@section('content')
	<div class="row">
	<div class="col-md-12">
		<div class="card">

		  <div class="card-body">
			<div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-5p">ID</th>
                  <th class="wd-10p">Image</th>
                  <th class="wd-15p">Product Name</th>
                  <th class="wd-20p">Product Quantity</th>
                  <th class="wd-15p">Category</th>
                  <th class="wd-15p">Status</th>
                  <th class="wd-15p">Action</th>
                </tr>
              </thead>
              <tbody>
              	@php
              		$i=1;
              	@endphp
              	@foreach($products as $product)
                <tr>
                  <td>{{ $i++ }}</td>
		          <td>
		          	<img src="{{asset($product->image_one)}}" width="50px" height="50px">
		          </td>
                  
                  <td>{{$product->product_name}}</td>
                  <td>{{$product->product_quantity}}</td>
                  <td>{{$product->category->category_name}}</td>
                  <td>
                  	@if($product->status==1)
                  	<span class="badge badge-success">Active</span>
                  	@else
                  	<span class="badge badge-danger">Unactive</span>
                  	@endif
                  </td>
                  <td>
                  	@if($product->status==1)
                  	<a href="{{route('product.unactive', ['id'=>$product->id])}}" class="btn btn-warning btn-sm">
                  	 	<i class="fa fa-arrow-down"></i>
                  	 </a>
                  	 @else
                  	 <a href="{{route('product.active', ['id'=>$product->id])}}" class="btn btn-info btn-sm">
                  	 	<i class="fa fa-arrow-up"></i>
                  	 </a>
                  	 @endif
                  	<a class="btn btn-success btn-sm" href="{{route('product.edit', ['id'=>$product->id])}}">
                  		<i class="fa fa-pencil"></i>
                  	</a>
                  	 <a class="btn btn-sm btn-danger" href="{{route('product.delete', ['id'=>$product->id])}}">
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
		
</div>
@endsection