@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
Administración del cliente
@stop

@section('content')
    <p>Ingrese su información para el registro</p>
 

    <div class="card">

        <div class="card-body">
            <form action="{{route('cliente.update', $cliente)}}" method="POST">
                @csrf
                @method('PUT')
                <x-adminlte-input type="text" name="nombre" label="Nombre" 
                    label-class="text-lightblue" value="{{ $cliente->nombre }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="apellido" label="Apellido" placeholder="Aquí su apellido"
                    label-class="text-lightblue" value="{{ $cliente->apellido }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="email" name="email" label="Correo" placeholder="Aquí su correo"
                    label-class="text-lightblue" value="{{ $cliente->email }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-envelope text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="telefono" label="Teléfono" placeholder="Aquí su teléfono"
                    label-class="text-lightblue" value="{{ $cliente->telefono }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-button type="submit" label="Actualizar" theme="primary" icon="fas fa-save"/>
            </form>
        </div>
    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
   @if (session("message"))
   <script>
     $(document).ready(function(){
        let mensaje = "{{session ('menssage')}}";
        Swal.fire({
            'title':'Resultado',
            'text': mensaje,
            'icon': 'success'
        })
     })
   </script>   

       
   @endif
@stop
