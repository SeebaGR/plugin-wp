@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Inicio Perfil cliente   </h1>
@stop

@section('content')


    <div class="card">
        <div class="card-head">
            <a href="" class="btn btn-primary float-right mt-2 mr-2">Nuevo</a>
        </div>
        <div class="card-body">
            {{-- Setup data for datatables --}}
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                          <div class="col-md-4 d-flex justify-content-center align-content-center flex-wrap">
                            <i class="fa fa-globe" aria-hidden="true"></i>
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Dominios Registrados</h5>
                              <p class="card-text">Aca va el contador si tuviera uno :D</p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                          <div class="col-md-4 d-flex justify-content-center align-content-center flex-wrap">
                            <i class="fa fa-globe" aria-hidden="true"></i>
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Ordenes</h5>
                              <p class="card-text">Ordenes de compra por pagar contador</p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                          <div class="col-md-4 d-flex justify-content-center align-content-center flex-wrap">
                            <i class="fa fa-globe" aria-hidden="true"></i>
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">Consultas ?</h5>
                              <p class="card-text">Información correspondiente  </p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
              </div>
        </div>
    </div>
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
        title: "Estas seguro?",
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
