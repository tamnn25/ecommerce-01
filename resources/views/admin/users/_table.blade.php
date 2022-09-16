@if($users->isEmpty())
<p class="red">{{ __('message.not_found_data') }}</p>
@else
<div class="d-flex justify-content-between">
    <div class="">
        {{-- create user link --}}
        <!-- <div class="d-inline-block"><a href="{{ route('admin.user.create') }}" class="btn btn-primary" title="{{ __('message.create_user') }}"><i class="fas fa-plus"></i> {{ __('message.create') }}</a></div> -->

        <!-- Set Limit Record in Per Page -->
        <select name="per_page" onChange="submitFilterUser(this)" class="d-inline-block ml-2 form-control-custom">
            <option value="10" {{ request()->per_page == 10 ? 'selected' : '' }}>10</option>
            <option value="50" {{ request()->per_page == 50 ? 'selected' : '' }}>50</option>
            <option value="100" {{ request()->per_page == 100 ? 'selected' : '' }}>100</option>
            <option value="200" {{ request()->per_page == 200 ? 'selected' : '' }}>200</option>
        </select>&nbsp;
        <label for="">{{ __('message.record_per_page') }}</label>
    </div>
    <div>
        {{ $users->appends(request()->input())->links() }}
    </div>
</div>

<table id="user-list" class="table table-bordered table-hover table-striped">
    @include('admin.users.__table_head')
    <tbody>
        @if(!empty($users))
        @foreach ($users as $key => $user)
        <tr>
            <td class="text-center">{{ $key+1 }}</td>
            <td>{{ $user->name }}</td>
            <td>
                @if($user->thumbnail)
                <img src="{{ asset($user->thumbnail) }}" alt="{{ $user->name }}" class="img-fluid" style="width: 240px; height: auto;">
                @endif
            </td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <!-- <td><a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-secondary btn-common" title="{{ __('message.detail_user') }}"><i class="fas fa-search-plus"></i> {{ __('message.detail') }}</a></td> -->
            <!-- <td><a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-info btn-common" title="{{ __('message.edit_user') }}"><i class="fas fa-edit"></i> {{ __('message.edit') }}</a></td> -->
            <td>
                <form action="{{ route('admin.customer.destroy', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-common" onclick="return confirm('{{ __('message.confirm_delete_user') }}')" title="{{ __('message.delete_user') }}"><i class="fas fa-trash-alt"></i> {{ __('message.delete') }}</button>
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
        $currentPage = $users->currentPage() - 1;
        $perPage = $users->perPage();
        $total = $users->total();
        $from = ($currentPage * $perPage) + 1;
        $to = ($currentPage * $perPage) + $perPage;
        @endphp
        {{ __('message.show_per_page', ['from' => $from, 'to' => $to, 'total' => $total]) }}
    </div>
    <div class="">
        {{ $users->appends(request()->input())->links() }}
    </div>
</div>
@endif