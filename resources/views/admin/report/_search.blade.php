<div class="mb-5 border p-3 bg-white section-search">
    <form action="{{ route('admin.report.order') }}" method="GET" id="frm-user-search">
        <input type="hidden" name="per_page" value="10" id="per-page">
        <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label">Ngày bắt đầu</label>
                    <input type="date" class="form-control" name="start_date" value="{{ request()->get('end_date') }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label">Ngày kết thúc</label>
                    <input type="date" class="form-control" name="end_date" value="{{ request()->get('end_date') }}">
                </div>
            </div>
        </div>

        <p>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('admin.report.order') }}'"><i class="fas fa-sync-alt"></i> {{ __('message.reset') }}</button>
            <button type="submit" class="btn btn-primary" title="{{ __('message.search_user') }}"><i class="fas fa-search"></i> {{ __('message.search') }}</button>
        </p>
    </form>
</div>