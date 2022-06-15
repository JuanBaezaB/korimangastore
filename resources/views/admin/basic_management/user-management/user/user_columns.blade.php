<td class="text-center">{{ $an_item->id }}</td>
<td class="fw-semibold">{{ $an_item->name }}</td>
<td class="d-none d-sm-table-cell">{{ $an_item->email }}</td>
<td class="d-none text-center d-sm-table-cell">
    @if ($an_item->image != null)
        <img src="{{ url('uploads/user/'.$an_item->image) }}"style="height: 75px; width: 75px;">
    @endif
    @if ($an_item->image == null)
        <img src="{{ url('media/avatars/avatar0.jpg') }}"style="height: 75px; width: 75px;">
    @endif
</td>