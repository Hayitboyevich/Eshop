@extends('admin.admin_layout')
@section('coupon')
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
                  <th class="wd-15p">Discount</th>
                  <th class="wd-15p">Name</th>
                  <th class="wd-20p">Status</th>
                  <th class="wd-15p">Action</th>
                </tr>
              </thead>
              <tbody>
              	@php
              		$i=1;
              	@endphp
              	@foreach($coupons as $coupon)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{$coupon->discaunt}}%</td>
                  <td>{{$coupon->coupon_name}}</td>
                  <td>
                  @if($coupon->status==1)
                  	<span class="badge badge-success">Active</span>
                  @else
                  	<span class="badge badge-danger">Unactive</span>
                  @endif
                  </td>
                  <td>
                  	@if($coupon->status==1)
                  	<a href="{{route('coupon.unactive', ['id'=>$coupon->id])}}" class="btn btn-warning btn-sm">
                  	 	<i class="fa fa-arrow-down"></i>
                  	 </a>
                  	 @else
                  	 <a href="{{route('coupon.active', ['id'=>$coupon->id])}}" class="btn btn-info btn-sm">
                  	 	<i class="fa fa-arrow-up"></i>
                  	 </a>
                  	 @endif
                  	<a class="btn btn-success btn-sm" href="{{route('coupon.edit', ['id'=>$coupon->id])}}">
                  		<i class="fa fa-pencil"></i>
                  	</a>
                  	 <a class="btn btn-sm btn-danger" href="{{route('coupon.delete', ['id'=>$coupon->id])}}">
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
				<h2>Create Coupon</h2>
			</div>			
		  <div class="card-body">
		  	<form action="{{route('coupon.store')}}" method="post">
		  		@csrf
			  	<div class="form-group">
			  		<label for="coupon_name">Name</label>
				  	<input type="text" class="form-control" name="coupon_name" id="coupon_name">	
			  	</div>
          <div class="form-group">
            <label for="discaunt">Discount</label>
            <input type="text" class="form-control" name="discaunt" id="discaunt">  
          </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		  </div>
		</div>
	</div>
</div>

@endsection