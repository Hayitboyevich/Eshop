@extends('admin.admin_layout')
@section('product') active show-sub @endsection
@section('add-product') active @endsection

@section('content')
 <div class="card pd-20 pd-sm-40">
     <div class="form-layout">
          <form action="{{route('product.update', ['id'=>$product->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" value="{{$product->product_name}}" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code" value="{{$product->product_code}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="price"  value="{{$product->price}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity"  value="{{$product->product_quantity}}">
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                    <option label="Choose category"></option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ $category->id == $product->category_id ? "selected" : ''}}>{{$category->category_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Brand" name="brand_id">
                    <option label="Choose Brand"></option>
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}" {{ $brand->id == $product->brand_id ? "selected" : ''}}>{{$brand->brand_name}}</option>
                    </select>
                    @endforeach
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Short Description: <span class="tx-danger">*</span></label>
                  <textarea name="short_description" id="summernote">{{$product->short_description}}</textarea>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                  <textarea name="long_description" id="summernote2">{{$product->long_description}}</textarea>
                </div>
              </div>
              
              <button class="btn btn-info mg-r-5">Add</button>
          
          </form>
          <form action="{{route('product.imageUpdate')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$product->id}}">
            <input type="hidden" name="image_one" value="{{$product->image_one}}">
            <input type="hidden" name="image_two" value="{{$product->image_two}}">
            <input type="hidden" name="image_three" value="{{$product->image_three}}">
            <div class="row row-sm mt-5">
               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Thumbnail Image: <span class="tx-danger">*</span></label>
                  <img src="{{ asset($product->image_one) }}" height="120px" width="120px">
                </div>
              </div>
               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                  <img src="{{ asset($product->image_two) }}" height="120px" width="120px">
                </div>
              </div>
               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                  <img src="{{ asset($product->image_three) }}" height="120px" width="120px">
                </div>
              </div>
               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Thumbnail Image: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_one">
                </div>
              </div>
               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_two">
                </div>
              </div>
               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_three">
                </div>
              </div>
            </div>
            <button class="btn btn-info mg-r-5">Image Update</button>
          </form>
            </div>
          </div>
</div>
@endsection