<div class="mb-2 mt-2 border p-3 bg-white">
    <form action="{{ route('admin.promotion.index') }}" method="GET" id="frm-promotion-search">
        <input type="hidden" name="per_page" value="10" id="per-page">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('message.promotion_code') }}</label>
                            <input type="text" class="form-control" name="code" value="{{ request()->get('code') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('message.discount') }}</label>
                            <input type="text" class="form-control" name="discount" value="{{ request()->get('discount') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('message.begin_date') }}</label>
                            <input type="text" class="form-control" name="begin_date" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('message.end_date') }}</label>
                            <input type="text" class="form-control datepicker" name="end_date" value="" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <p>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('admin.promotion.index') }}'"><i class="fas fa-sync-alt"></i> {{ __('message.reset') }}</button>
            <button type="submit" class="btn btn-primary" title="{{ __('message.search_product') }}"><i class="fas fa-search"></i> {{ __('message.search') }}</button>
        </p>
    </form>
</div>