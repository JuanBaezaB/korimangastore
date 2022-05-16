@extends('layouts.backend')

@section('content')
    <div class="content">
        <form action="" class="js-validation" method="POST">
            <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Formulario de ingreso de {{ $tipo_formulario }}</h3>
                        <div class="block-options">
                            <button type="submit" class="btn btn-sm btn-alt-secondary">
                                <i class="fa fa-fw fa-check"></i> Submit
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="">
                            <!-- Regular -->
                            <h2 class="content-heading">Regular</h2>
                            <div class="row items-push">
                                <div class="col">
                                    <div class="mb-4">
                                        <label class="form-label" for="val-username">Username <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="val-username" name="val-username"
                                            placeholder="Enter a username..">
                                    </div>
                                    @yield('form-fields')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection