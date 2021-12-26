<div class="mb-2 mt-2 border p-2">
    <form  action="{{ route('admin.product.index') }}" method="GET">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="name" placeholder="product name" value="{{ request()->get('name') }}">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Search by Category</option>
                        @if(!empty($categories))
                            @foreach ($categories as $categoryId => $categoryName)
                                <option value="{{ $categoryId+1 }}" >{{ $categoryName }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        
        {{-- <div style=" width:50% " class="mb-3">
            <label>Search by status:</label> <br>
            <input type="text" class="form-control" name="status" placeholder="product status" value="{{ request()->get('status') }}">
        </div> --}}
        
        
        <div class="mb-3">
            <button type="submit" class="btn btn-outline-primary">Search</button>
        </div>
    </form>
</div>