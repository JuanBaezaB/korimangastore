@extends('admin.template_list')

<?php /*
Variables:
- get_one_route
- update_modal_fields
*/ ?>

@section('update-modal')
<!-- -->
@endsection

@push('scripts-extra')
<!-- modal -->
<script src="{{ asset('js/pages/update_modal.js') }}"></script>
<script>
    jQuery(document).ready(function ($) {
        var getOneUrl = {{ Js::from(route($get_one_route)) }};
        var updateModalFields = {{ Js::from($update_modal_fields) }} ;
        var csrf = '{{ csrf_token() }}';
        $('#update_item').updateModal({
            form: '#form-update',
            editButtons: '.x-edit-button',
            getOneUrl: getOneUrl,
            csrf: csrf,
            fields: updateModalFields
        });
    });
</script>
@endpush
