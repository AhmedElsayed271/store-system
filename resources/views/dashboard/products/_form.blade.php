<div class="card-body">
    <div class="form-group">
        <label for="name">name</label>
        <input type="text" name="name" value="{{ old('name', $product->name ?? "") ?? '' }}" class="form-control @error('name') is-invalid @enderror" id="name"
            value="" placeholder="Enter name">
        @error('name')
            <div class="text-danger mt-2"> {{ $message }} </div>
        @enderror
        {{-- <x-form.input type="text" :value="$category->name" name="name" class="form-control @error('name') is-invalid @enderror" id ="name" /> --}}
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <textarea name="description" id="" class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description ?? "")  ?? "" }}</textarea>
        @error('description')
            <div class="text-danger mt-2"> {{ $message }} </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Price</label>
        <input name="price" id="" value="{{ old('price',$product->price ?? '') ?? "" }}" class="form-control @error('price') is-invalid @enderror" />
        @error('price')
            <div class="text-danger mt-2"> {{ $message }} </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Compare Price</label>
        <input name="compare_price" value="{{ old('compare_price', $product->compare_price ?? "") ?? "" }}" id="" class="form-control @error('compare_price') is-invalid @enderror" />
        @error('compare_price')
            <div class="text-danger mt-2"> {{ $message }} </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Category</label>
        <select name="category_id" id="" class="form-control @error('category_id') is-invalid @enderror">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" >{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="text-danger mt-2"> {{ $message }} </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Main Photo</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" name="photo" class="custom-file-input" id="exampleInputFile" accept="image/*">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text">Upload</span>
            </div>
        </div>
        @error('photo')
            <div class="text-danger mt-2"> {{ $message }} </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Photos</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" name="photos[]" multiple class="custom-file-input" id="exampleInputFile" accept="image/*">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <div class="input-group-append">
                <span class="input-group-text">Upload</span>
            </div>
        </div>
        @error('photos')
            <div class="text-danger mt-2"> {{ $message }} </div>
        @enderror
    </div>
    <!-- radio -->
    <div class="form-group">
        <div class="form-check">
            <input value="active" class="form-check-input" type="radio" name="status" @checked(old('status', $product->status ?? "") == 'active') >
            <label class="form-check-label">Active</label>
        </div>
        <div class="form-check">
            <input value="inactive" class="form-check-input" type="radio" name="status" @checked(old('status', $product->status ?? "") == 'inactive') >
            <label class="form-check-label">inActive</label>
        </div>
        <div class="form-check">
            <input value="archived" class="form-check-input" type="radio" name="status" @checked(old('status', $product->status ?? "") == 'archived') >
            <label class="form-check-label">Archived</label>
        </div>
        @error('status')
            <div class="text-danger mt-2"> {{ $message }} </div>
        @enderror
    </div>
</div>


</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $button_name ?? 'Save' }}</button>
</div>
