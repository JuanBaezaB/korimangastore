@once
   @push('js_after_stack')
       <script>
            $(document).ready(function () {
                $('#{{ $id }}').select2({
                    ajax: {
                        url: '{{ route("product.search") }}',
                        dataType: 'json',
                        method: 'POST',
                        data: function (params) {
                            return $.extend({}, params, { _token: $('meta[name=csrf-token]').prop('content') });
                        }
                    },
                    placeholder: 'Buscar un producto...'
                });
            });
       </script>
   @endpush 
@endonce

<select id="{{ $id }}" 
    {{ $attributes->except(['id'])->merge(['class' => 'js-select2 form-select', 'style' => ' width: 100%;']) }} 
>
    <option></option>
</select>
