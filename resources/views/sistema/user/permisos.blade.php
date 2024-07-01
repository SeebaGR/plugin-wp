@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administración de Permisos</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <div class="card">
        <div class="card-header">
            <x-adminlte-button  label="Nuevo" theme="primary" icon="fas fa-key" data-toggle="modal" data-target="#modalPurple"  class="float-right"/>
        </div>
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                $heads = [
                    'ID',
                    'Nombre',
                    ['label' => 'Actions', 'no-export' => true, 'width' => 10],
                ];

                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

                $config = [
                   'languaje'=>[
                        'url'=>'//cdn.datatables.net/plug-ins/2.0.8/i18n/es-CL.json',
                   ]
                ];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
                @foreach ($permisos  as $permiso)
                    <tr>
                       <td>{{$permiso->id}}</td>
                       <td>{{$permiso->name}}</td>
                       <td><a href="{{route('permisos.edit', $permiso)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                       </a> 
                            <form style="display: inline" action="{{route('permisos.destroy', $permiso)}}" method="POST" class="formEliminar">
                                @csrf
                                @method('delete')
                                {!!$btnDelete!!}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>

        {{-- Themed --}}
        <x-adminlte-modal id="modalPurple" title="Nuevo Permiso" theme="primary"
                icon="fas fa-bolt" size='lg' disable-animations>
                <form action="{{route('permisos.store')}}" method="POST">
                    @csrf
                    {{-- With label, invalid feedback disabled, and form group class --}}
                        <div class="row">
                            <x-adminlte-input name="nombre" label="Nombre" placeholder="Aquí su rol..."
                                fgroup-class="col-md-6" disable-feedback/>
                        </div>
                        <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-key"/>
                </form>
        </x-adminlte-modal>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
            $(document).ready(function(){
                $('.formEliminar').submit(function(e){
                    e.preventDefault();
                    Swal.fire({
        title: "Estas seguro=",
        text: "Se va ha eliminar un registro!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminar!"
        }).then((result) => {
            if(result.isConfirmed){
                this.submit();
            }
        });
    })
});
</script>
@stop
