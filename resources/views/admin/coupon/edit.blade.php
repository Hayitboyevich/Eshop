@extends('admin.admin_layout')
@section('content')

<div class="row row-sm">
	<div class="col-md-8 m-auto">
		<div class="card">
			<div class="card-header">
			Edit Ctegory
			</div>
		  <div class="card-body">
			<form action="{{route('coupon.update', ['id'=>$coupon->id])}}" method="post">
				@csrf
			    <div class="form-group">
			      <label for="coupon_name">Coupon Name:</label>
			      <input type="coupon_name" class="form-control" id="coupon_name"  name="coupon_name" value="{{$coupon->coupon_name}}">
			    </div>
			    <div class="form-group">
			      <label for="discaunt">Discaunt:</label>
			      <input type="discaunt" class="form-control" id="discaunt"  name="discaunt" value="{{$coupon->discaunt}}">
			    </div>
			   
			    <div class="form-group form-check">
			      <label class="form-check-label">
			        <input class="form-check-input" type="checkbox" name="status" {{ $coupon->status == 1 ? 'checked' : ''}} value="{{old('status') ?? $coupon->status ?? 0}}">
			      </label>
			    </div>
			    <button type="submit" class="btn btn-primary">Submit</button>
			  </form>
		  </div>
		</div>
		</div>
		
	</div>


@endsection