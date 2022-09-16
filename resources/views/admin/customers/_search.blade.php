<div class="mb-5 border p-3 bg-white section-search">
    <form action="{{ route('admin.customer.index') }}" method="GET" id="frm-customer-search">
        <input type="hidden" name="per_page" value="10" id="per-page">
        <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label">{{ __('message.customer.name') }}</label>
                    <input type="text" class="form-control" name="name" value="{{ request()->get('name') }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label">{{ __('message.email') }}</label>
                    <input type="text" class="form-control" name="email" value="{{ request()->get('email') }}">
                </div>
            </div>
        </div>
    
        <p>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('admin.customer.index') }}'"><i class="fas fa-sync-alt"></i> {{ __('message.reset') }}</button>
            <button type="submit" class="btn btn-primary" title="{{ __('message.search_customer') }}"><i class="fas fa-search"></i> {{ __('message.search') }}</button>
        </p>
    </form>
</div>
