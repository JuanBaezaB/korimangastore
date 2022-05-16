@extends('layouts.backend')

@section('template_title')
    provider
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('provider') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('provider.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-provider" class="table table-striped table-hover" style="width:100%">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nombre Sucursal</th>
                                        <th>Direccion Sucursal</th>
                                        <th>Jefe Sucursal</th>
                                        <th>Telefono Sucursal</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($provider as $provider)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $provider->nombre_sucursal }}</td>
                                            <td>{{ $provider->direccion_sucursal }}</td>
                                            <td>{{ $provider->jefe_sucursal }}</td>
                                            <td>{{ $provider->telefono_sucursal }}</td>

                                            <td>
                                                <form class="delete" action="{{ route('provider.destroy', $provider->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('provider.show', $provider->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('provider.edit', $provider->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $provider->links() !!}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#table-provider').DataTable();
        });
    </script>

    <script>
        $('.delete').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: "No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    /*
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )*/
                    this.submit();
                }
            })

        });
    </script>

    @if (session('success') == 'provider deleted successfully')
        <script>
            Swal.fire(
                'Eliminado!',
                'El registro ha sido eliminado.',
                'success'
            )
        </script>
    @endif
    @if (session('success') == 'provider updated successfully')
        <script>
            Swal.fire(
                'Actualizado!',
                'El registro ha sido actualizado.',
                'success'
            )
        </script>
    @endif
    @if (session('success') == 'provider created successfully')
        <script>
            Swal.fire(
                'Ingresado!',
                'El ingreso se ha relizado exitosamente.',
                'success'
            )
        </script>
    @endif
@endsection
