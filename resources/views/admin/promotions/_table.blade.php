@if($promotions->isEmpty())
    {{-- create product link --}}
    <div class="d-inline-block mb-2"><a href="{{ route('admin.promotion.create') }}" class="btn btn-primary" title="{{ __('message.create_promotion') }}"><i class="fas fa-plus"></i> {{ __('message.create') }}</a></div>

    <p class="red">{{ __('message.not_found_data') }}</p>
@else
    <div class="d-flex justify-content-between mb-2">
        <div class="">
            {{-- create product link --}}
            <div class="d-inline-block"><a href="{{ route('admin.promotion.create') }}" class="btn btn-primary" title="{{ __('message.create_promotion') }}"><i class="fas fa-plus"></i> {{ __('message.create') }}</a></div>
            
            <!-- Set Limit Record in Per Page -->
            <select name="per_page" onChange="submitFilterPromotion(this)" class="d-inline-block ml-2 form-control-custom">
                <option value="10" {{ request()->per_page == 10 ? 'selected' : '' }}>10</option>
                <option value="50" {{ request()->per_page == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ request()->per_page == 100 ? 'selected' : '' }}>100</option>
                <option value="200" {{ request()->per_page == 200 ? 'selected' : '' }}>200</option>
            </select>&nbsp;
            <label for="">{{ __('message.record_per_page') }}</label>
        </div>
        <div>
            {{ $promotions->appends(request()->input())->links() }}
        </div>
    </div>

    <table id="promotion-list" class="table table-bordered table-hover table-striped">
        @include('admin.promotions.__table_head')
        <tbody>
            @if(!empty($promotions))
                @foreach ($promotions as $key => $promotion)
                    <tr>
                        <td class="text-center">{{ $key+1 }}</td>
                        <td>{{ $promotion->code }}</td>
                        <td>{{ $promotion->discount }}</td>
                        <td>{{ $promotion->begin_date }}</td>
                        <td>{{ $promotion->end_date }}</td>
                        <td><a href="{{ route('admin.promotion.show', $promotion->id) }}" class="btn btn-secondary btn-common"><i class="fas fa-search-plus"></i> {{ __('message.detail') }}</a></td>
                        <td><a href="{{ route('admin.promotion.edit', $promotion->id) }}" class="btn btn-info btn-common"><i class="fas fa-edit"></i> {{ __('message.edit') }}</a></td>
                        <td>
                            <form action="{{ route('admin.promotion.destroy', $promotion->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-common" onclick="return confirm('{{ __('message.confirm_delete') }}')"><i class="fas fa-trash-alt"></i> {{ __('message.delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="d-flex justify-content-between">
        <div>
            @php
                $currentPage = $promotions->currentPage() - 1;
                $perPage = $promotions->perPage();
                $total = $promotions->total();
                $from = ($currentPage * $perPage) + 1;
                $to = ($currentPage * $perPage) + $perPage;
            @endphp
            {{ __('message.show_per_page', ['from' => $from, 'to' => $to, 'total' => $total]) }}
        </div>
        <div class="">
            {{ $promotions->appends(request()->input())->links() }}
        </div>
    </div>
@endif
