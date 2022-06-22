<td class="text-center">{{ $an_item->id }}</td>
<td class="fw-semibold">{{ $an_item->name }}</td>
<td class="d-none d-sm-table-cell">{{ $an_item->email }}</td>
<td class="d-none text-center d-sm-table-cell">
    @if ($an_item->image != null)
        <img class="img-avatar img-avatar75" src="{{ asset('storage/'.$an_item->image) }}">
    @endif
    @if ($an_item->image == null)
        <img class="img-avatar img-avatar75" src="{{ url('media/avatars/avatar0.jpg') }}">
    @endif
</td>
