@once
   @push('js_after_stack')
       <script>
            jQuery(function($) {
                $(document).ready(function () {
                    var $this = $('#{{ $id }}');
                    $this.select2({
                        ajax: {
                            url: '{{ route("branch.search") }}',
                            dataType: 'json',
                            method: 'POST',
                            data: function (params) {
                                var $this = $('#{{ $id }}');
                                var extra = { 
                                    _token: $('meta[name=csrf-token]').prop('content'),
                                    selected: $this.attr('current') | $this.val()
                                };
                                @if($allBranches)
                                    extra.add_all_option = true;
                                @endif
                                return $.extend({}, params, extra);
                            }
                        },
                        placeholder: 'Seleccionar sucursal'
                    });
                    var current = $this.attr('current') | $this.val();

                    function ajaxAddOption(current) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route("branch.get_one") }}',
                            data: JSON.stringify({ 
                                id: current,
                                _token: $('meta[name=csrf-token]').attr('content')
                            }),
                            contentType: 'aplication/json;'
                        }).then(function(data) {
                            data.text = data.name;
                            var option = new Option(data.name, data.id, true, true);
                            $this.append(option).trigger('change', [true]);
                            $this.trigger({
                                type: 'select2:select',
                                params: {
                                    data: data
                                }
                            });
                        });
                    }

                    @if($allBranches)
                        if (current == -1) {
                            var option = new Option('Todas', -1, true, true);
                            $this.append(option).trigger('change', [true]);
                            $this.trigger({
                                type: 'select2:select',
                                params: {
                                    data: { id: -1, text: 'Todas' }
                                }
                            });
                        } else {
                            ajaxAddOption(current);
                        }
                    @else
                        ajaxAddOption();
                    @endif

                    @if($redirectTemplate)
                    $this.on('change', function(evt, dont) {
                        if (dont) return;
                        var url = '{{ $redirectTemplate }}';
                        var allUrl = '{{ $redirect }}';
                        var newId = this.value;
                        if (newId !== "") {
                            location.href = url.replace('id', newId);
                        } else {
                            location.href = allUrl;
                        }
                    });
                    @endif
                });
            });
       </script>
   @endpush 
@endonce

<select id="{{ $id }}" 
current="{{ $current }}"
{{ $attributes->except(['id', 'autocomplete'])->merge(['class' => 'js-select2 form-select']) }} 
autocomplete="off">
</select>