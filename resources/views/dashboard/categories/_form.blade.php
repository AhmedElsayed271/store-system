<div class="card-body">
    <div class="form-group">
        <label for="name">name</label>
        <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
            value="{{ old('name', $category->name) }}" placeholder="Enter name">
        @error('name')
            <div class="text-danger mt-2"> {{ $message }} </div>
        @enderror
        {{-- <x-form.input type="text" :value="$category->name" name="name" class="form-control @error('name') is-invalid @enderror" id ="name" /> --}}
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <textarea name="description" id="" class="form-control @error('description') is-invalid @enderror">{{ old('name', $category->description) }}</textarea>
        @error('description')
            <div class="text-danger mt-2"> {{ $message }} </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <select name="parent_id" id="" class="form-control @error('parent_id') is-invalid @enderror">
            <option value="">Primary Category</option>

            @foreach ($categories as $cat)
                <option @if ($cat->id == $category->id) selected @endif value="{{ $cat->id }}">
                    {{ $cat->name }}</option>
            @endforeach
        </select>
        @error('parent_id')
            <div class="text-danger mt-2"> {{ $message }} </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Photo</label>
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
    <!-- radio -->
    <div class="form-group">
        <div class="form-check">
            <input value="active " class="form-check-input" type="radio" name="status" @checked(old('status', $category->status) == 'active')>
            <label class="form-check-label">Active</label>
        </div>
        <div class="form-check">
            <input value="inactive" class="form-check-input" type="radio" name="status" @checked(old('status', $category->status) == 'inactive')>
            <label class="form-check-label">inActive</label>
        </div>
        <div class="form-check">
            <input value="archived" class="form-check-input" type="radio" name="status" @checked(old('status', $category->status) == 'archived')>
            <label class="form-check-label">Archived</label>
        </div>
        @error('status')
            <div class="text-danger mt-2"> {{ $message }} </div>
        @enderror
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $button_name ?? 'Save' }}</button>
</div>
