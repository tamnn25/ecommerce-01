@if($comment->isEmpty())
<p class="red">{{ __('message.not_found_data') }}</p>
@else
<div class="d-flex justify-content-between">
    <div class="">
        <label for="">{{ __('message.record_per_page') }}</label>
    </div>
    <div>
        {{ $comment->appends(request()->input())->links() }}
    </div>
</div>

<table class="table table-bordered table-hover table-striped">
    @include('admin.comment.__table_head')
    <tbody>
        @if(!empty($comment))
        @foreach ($comment as $key => $comments)
        <tr>
            <td class="text-center">{{ $key+1 }}</td>
            <td>{{ $comments->user->name }}</td>
            <td>{{ $comments->product->name }}</td>
            <td>{{ $comments->content }}</td>

            <td>{{ $comments->rate . ' ' . 'sao' }}</td>

            <td>{{ $comments->user->email }}</td>
            <td>{{ $comments->created_at }}</td>

            <td>
                <form action="{{ route('admin.comment.destroy', $comments->id) }}" method="post">
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
@endif