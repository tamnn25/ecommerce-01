<div class="d-flex justify-content-between mb-3">
    <div>
        {{-- create category link --}}
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('message.create') }}</a>

        @if(!$categories->isEmpty())
            {{ __('message.display_total_record', ['total' => $categories->count()]) }}
        @endif
    </div>
    <div>
        <form action="{{ route('admin.category.index') }}" method="get">
            <input type="text" placeholder="" name="name" value="{{ request()->name }}" class="form-control-custom d-inline-block">
            <button type="submit" class="btn btn-primary d-inline-block"><i class="fas fa-search"></i> {{ __('message.search') }}</button>
        </form>
    </div>
</div>