@extends('admin.layouts.master')
@section('title')
    Thêm mới sản phẩm
@endsection
@section('content')
    <h1>Thêm mới sản phẩm</h1>
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
   <div class="d-flex gap-3">
    <div class="mt-3 col-6">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}">
        @error('name')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mt-3 col-6">
        <label for="">Active</label>
        <select name="is_active" class="form-control" value="1">
            <option value="5">Tất cả</option>
            <option value="1">Active</option>
            <option value="0">InActive</option>
        </select>
        @error('is_active') 
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>  
   </div>
   <div class="d-flex gap-3">
    <div class="mt-3 col-6">
        <label for="">Category</label>
        
        <select name="category_id" class="form-control" value="{{old('category_id')}}">
            <option value="0">Tất cả</option>
            @foreach ($data as $cate)
            <option value="{{$cate->id}}">{{$cate->name}}</option>
            @endforeach
        </select>   
       
        @error('category_id')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
    <div class="mt-3 col-6">
        <label for="">Image</label>
        <input type="file" name="images[]" multiple="multiple" class="form-control">
        @error('images')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
   </div>
   <div class="ms-3">
    <h4 class="mt-3">Biến thể</h4>
    <div id="variants-container">
        <div class="variant mb-3" id="variant-1">
            <h5>Biến thể 1</h5>
            <!-- Giá -->
            <div class="mb-2">
                <label for="variants[0][price]" class="form-label">Giá</label>
                <input type="number" class="form-control" name="variants[0][price]" step="0.01" required>
            </div>
            <!-- Tồn kho -->
            <div class="mb-2">
                <label for="variants[0][quantity]" class="form-label">Tồn kho</label>
                <input type="number" class="form-control" name="variants[0][quantity]" required>
            </div>

            <!-- Thuộc tính -->
            <div class="mb-2">
                <label for="variants[0][attributes]" class="form-label">Thuộc tính</label>
                <select class="form-control" name="variants[0][attribute_value_ids][]" multiple required>
                    @foreach ($attributes as $attribute)
                        <optgroup label="{{ $attribute->name }}">
                            @foreach ($attribute->values as $value)
                                <option value="{{ $value->id }}">{{ $value->value }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Nút thêm biến thể -->
    <button type="button" class="btn btn-secondary mb-3" id="add-variant">Thêm biến thể</button>
   </div>
   <div class="d-flex gap-3">
    <div class="mt-3 ms-3">
        <label for="">Description</label>
        <textarea id="content" name="description" class="form-control" value="{{old('description')}}"></textarea>
        @error('description')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
   </div>
   <button type="submit" class="btn btn-primary mt-3 ms-3">Thêm</button>
    </form>
    <script>
		let variantIndex = 1;
		document.getElementById('add-variant').addEventListener('click', () => {
			const container = document.getElementById('variants-container');
			const variantHtml = `
				<div class="variant mb-3" id="variant-${variantIndex + 1}">
					<h5>Biến thể ${variantIndex + 1}</h5>
					<div class="mb-2">
						<label for="variants[${variantIndex}][price]" class="form-label">Giá</label>
						<input type="number" class="form-control" name="variants[${variantIndex}][price]" step="0.01" required>
					</div>
					<div class="mb-2">
						<label for="variants[${variantIndex}][quantity]" class="form-label">Tồn kho</label>
						<input type="number" class="form-control" name="variants[${variantIndex}][quantity]" required>
					</div>
					<div class="mb-2">
						<label for="variants[${variantIndex}][attributes]" class="form-label">Thuộc tính</label>
						<select class="form-control" name="variants[${variantIndex}][attribute_value_ids][]" multiple required>
							@foreach ($attributes as $attribute)
								<optgroup label="{{ $attribute->name }}">
									@foreach ($attribute->values as $value)
										<option value="{{ $value->id }}">{{ $value->value }}</option>
									@endforeach
								</optgroup>
							@endforeach
						</select>
					</div>
				</div>
			`;
			container.insertAdjacentHTML('beforeend', variantHtml);
			variantIndex++;
		});
	</script>
@endsection