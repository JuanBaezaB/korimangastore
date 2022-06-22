@extends('layouts.backend')

@section('css_after')
    <meta name="the_branch" content="{{ isset($the_branch->id) ? $the_branch->id : '' }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Venta</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Area de Ventas</li>
                        <li class="breadcrumb-item active" aria-current="page">Venta</li>
                    </ol>
                </nav>
            </div>
            
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Realizar Venta</h3>
                <div class="block-options">
                    
                </div>
            </div>
            
            <div class="block-content block-content-full">
                <div class="row items-push">
                    <div class="col-lg-8 col-md-6">
                        <div class="">
                            <x-branch-select
                            style="width: 100%;"
                            id="change-branch-select"
                            :current="app('request')->input('sucursal')" />
                        </div>
                    
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="">
                            <x-product-search id="select-product" />
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3"><input type="number" id="qnt-product" class="form-control" min="1" value="1" autocomplete="off"></input></div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <a class="btn btn-success" id="btn-add-product"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="block-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-vcenter fs-sm" id='cart-table'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-end" colspan="3">Descuento</td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar">
                                            <div class="btn-group" role="group">
                                                <input type="radio" class="btn-check" name="discount-radio" id="discount-radio-amount" autocomplete="off" checked>
                                                <label class="btn btn-outline-secondary" for="discount-radio-amount">$</label>
                                                
                                                <input type="radio" class="btn-check" name="discount-radio" id="discount-radio-percent" autocomplete="off">
                                                <label class="btn btn-outline-secondary" for="discount-radio-percent">%</label>
                                            
                                            </div>
                                            <div class="input-group">
                                                <input type="number" id="discount-amount" class="form-control d-inline" value="0" min="0">
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="text-end" colspan="3"><strong>Total</strong></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                

            </div>
        </div>
        <!-- END Elements -->
    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/select2/js/select2.full.js') }}"></script>

    <script>
        /*
            opts = {
                $ jQuery global object
                cartTableSelector string
                searchProductSelector string
                numberBoxSelector string
            }

        */
        function Cart(opts) {
            opts = opts || {};
            var _this = this;
            this.onCart = [];
            this.cartTableSelector = opts.cartTableSelector;
            this.searchProductSelector = opts.searchProductSelector;
            this.numberBoxSelector = opts.numberBoxSelector;
            this.$ = opts.$;

            function make$getter(prop) {
                return function() {
                    return _this.$(_this[prop]);
                };
            }

            this.cartTable = make$getter('cartTableSelector');
            this.searchProduct = make$getter('searchProductSelector');
            this.numberBox = make$getter('numberBoxSelector');

            this.discount = 0.0;
            this.discountType = '$';

            this.removeButtonHtml = '<a class="btn btn-danger" id="btn-remove-stock"><i class="fa fa-minus"></i></a>';

            this.tbody = function() {
                return _this.cartTable().find('tbody');
            };

            this.getRows = function() {
                var $t = _this.tbody();
                var arr = $t.find('tr').get();
                arr.pop();
                arr.pop();
                return arr;
            };

            this.updateRow = function(i) {
                if (i !== 0 && !i) {
                    console.error('[Cart] no index given to update, given ' + i);
                    return;
                }
                var data = _this.onCart[i];
                var rows = _this.getRows();
                var row;
                if (i >= rows.length) {
                    var $tbody = _this.tbody();
                    var td = '<td></td>';
                    var tds = td+td+td+td+td;
                    row = $('<tr>'+tds+'</tr>');
                    var removeButtonHtml = _this.removeButtonHtml;
                    var removeButton = _this.$(removeButtonHtml);
                    
                    if (rows.length == 0) {
                        $tbody.prepend(row);
                    } else {
                        _this.$(rows[rows.length - 1]).after(row);
                    }
                    row.children(':last-child').append(removeButton);
                    removeButton.click(function() {
                        _this.removeProductById(data.id);
                    });
                } else {
                    row = _this.$(rows[i]);
                }
                row.children('td:nth-child(1)').first().text(data.id);
                row.children('td:nth-child(2)').first().text(data.name);
                row.children('td:nth-child(3)').first().text(data.n);
                row.children('td:nth-child(4)').first().text('$ ' + data.total);
                
                var actionColumn = row.children('td:nth-child(5)').first();
                actionColumn.data('cart-data', data);

                _this.updateTotal();
            };

            this.updateTotal = function() {
                var s = 0;
                _this.onCart.forEach(function (x) {
                    s += x.total;
                });

                if (_this.discountType == '$') {
                    s -= _this.discount;
                } else {
                    s -= s*_this.discount/100.0;
                }

                s = Math.max(0, s);

                var tr = _this.tbody().children('tr:last-child').first();
                tr.children('td:last-child').text('$ '+s);
            };

            this.addProduct = function() {
                var $ = _this.$;
                var $sp = _this.searchProduct();
                var data = $sp.select2('data');
                if (data.length == 0 || (data.length == 1 && !data[0].id && !data[0].text)) {
                    _this.cartTable().trigger('cart:no-product');
                    return;
                }
                data = data[0];

                var found = null;
                var foundI = -1;
                _this.onCart.forEach(function(x, i) {
                    if (x.id == data.id) {
                        found = x;
                        foundI = i;
                    }
                });

                var n = parseInt(_this.numberBox().val());
                if (!found) {
                    var i = _this.onCart.length;
                    _this.onCart.push({
                        id: data.id,
                        name: data.name,
                        n: n,
                        unit_price: data.price,
                        total: data.price * n
                    });
                    _this.updateRow(i);
                } else {
                    found.name = data.name;
                    found.n += n;
                    found.unit_price = data.price;
                    found.total = found.n * found.unit_price;
                    _this.updateRow(foundI);
                }

            };

            this.removeProductById = function(id) {
                var i = -1;
                _this.onCart.forEach(function(x, idx) {
                    if (x.id == id) {
                        i = idx;
                    }
                });
                if (i == -1) return;
                _this.removeProduct(i);
            };

            this.removeProduct = function(i) {
                _this.onCart.splice(i, 1);
                var rows = _this.getRows();
                $(rows[i]).remove();
                _this.updateTotal();
            };
        }


        jQuery(function ($) {
            $(document).ready(function () {
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                    }
                });

                var cart = new Cart({
                    '$': $,
                    'cartTableSelector': '#cart-table',
                    'searchProductSelector': '#select-product',
                    'numberBoxSelector': '#qnt-product'
                });
                window.cart = cart;
                $('#btn-add-product').click(function() {
                    cart.addProduct();
                });

                $('#cart-table').on('cart:no-product', function() {
                    Swal.fire('Error', 'Falta ingresar un producto', 'error');
                });

                function getDiscountInput() {
                    return $('#discount-amount');
                }

                /**
                 * Delimits the valid input range, if it less or more than the minimum or maximum, clamp to those values
                 * Also update the Cart's discountType and discount value
                 * 
                 */
                function makeLimiterForDiscountInput(mn, mx, opSymbol) {
                    function limiter() {
                        var $t = $('#discount-amount');
                        var val = $t.val();
                        $t.val(Math.max(mn, Math.min(val, mx)));
                        val = $t.val();
                        cart.discountType = opSymbol;
                        cart.discount = val;
                        cart.updateTotal();
                    }

                    return function () {
                        limiter();
                        getDiscountInput().data('limiter', limiter);
                    };
                }

                var amountLimiter = makeLimiterForDiscountInput(0.0, Infinity, '$');
                var percentLimiter = makeLimiterForDiscountInput(0.0, 100.0, '%');
                $('#discount-radio-percent').click(percentLimiter);
                $('#discount-radio-amount').click(amountLimiter);
                getDiscountInput().change(function() {
                    var $this = $(this);
                    $this.data('limiter')();
                });
                amountLimiter();


            });
        });
    </script>

        

    @if (session('success') == 'created')
        <script>
            Swal.fire(
                'Ingresado!',
                'El ingreso se ha relizado exitosamente.',
                'success'
            )
        </script>
    @endif

    @if (session('success') == 'deleted')
        <script>
            Swal.fire(
                'Eliminado!',
                'El registro ha sido eliminado.',
                'success'
            )
        </script>
    @endif

    @if (session('success') == 'updated')
        <script>
            Swal.fire(
                'Actualizado!',
                'El registro ha sido actualizado.',
                'success'
            )
        </script>
    @endif
@endsection
