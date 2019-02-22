@extends('layouts.app')
@section('contenido')
<div class="container-fluid ">
    <div class="row">
        <div class="col-md-12">
             @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('NOTAS') }}</div>
                <div class="card-body"> 
                    <form action="{{ route('notas.editarnota') }}" method="POST">
                               @csrf
                     @forelse($notas as $nota)
                        <div class="form-group row">
                            <label  class="col-md-2 col-form-label text-md-right">{{ __('NOTA 1') }}</label>
                         <div class="col-md-2">
                            <input type="hidden" value="{{ $nota->id }}">
                        <input type="text" class="form-control" name="nota1"  value="{{ $nota->nota1 }}" >
                        </div>
                        <label  class="col-md-2 col-form-label text-md-right">{{ __('NOTA 5') }}</label>
                        <div class="col-md-2">
                        <input  type="text" class="form-control" name="nota5" value="{{ $nota->nota5 }}" >
                        </div>
                        <label  class="col-md-2 col-form-label text-md-right">{{ __('ESTADO NOTA') }}</label>
                        <div class="col-md-2">
                        @if( $nota->estado_nota  == 1 )
                        <input type="text" class="form-control" value="APROBADO" readonly></font>
                        @else
                        <input type="text" class="form-control" value="DESAPROBADO" readonly></font>  
                        @endif
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="dni" class="col-md-2 col-form-label text-md-right">{{ __('NOTA 2') }}</label>

                        <div class="col-md-2">
                        <input  type="text" class="form-control" name="nota2"  value="{{ $nota->nota2 }}" >   
                        </div>
                        <label for="nick" class="col-md-2 col-form-label text-md-right">{{ __('NOTA 6') }}</label>

                        <div class="col-md-2">
                        <input  type="text" class="form-control" name="nota6"  value="{{ $nota->nota6 }}" >
                        </div>
                        <label  class="col-md-2 col-form-label text-md-right">{{ __('ESTADO PERIODO') }}</label>
                        <div class="col-md-2">
                        @if( $nota->estado_periodo  == 1 )
                        <input  type="text" class="form-control"  value="ACTIVO" readonly>
                        @else
                        <input  type="text" class="form-control"  value="INACTIVO" readonly>  
                        @endif
                        </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-md-2 col-form-label text-md-right">{{ __('NOTA 3') }}</label>
                         <div class="col-md-2">
                        <input type="text" class="form-control" name="nota3"  value="{{ $nota->nota3 }}" >
                        </div>

                        <label  class="col-md-2 col-form-label text-md-right">{{ __('NOTA 7') }}</label >

                        <div class="col-md-2">
                        <input  type="text" class="form-control" name="nota7"  value="{{ $nota->nota7 }}" >
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="dni" class="col-md-2 col-form-label text-md-right">{{ __('NOTA 4') }}</label>

                            <div class="col-md-2">
                                <input  type="text" class="form-control" name="nota4"  value="{{ $nota->nota4 }}" >
                            </div>
                            <label for="nick" class="col-md-2 col-form-label text-md-right">{{ __('NOTA 8') }}</label>

                            <div class="col-md-2">
                                <input  type="text" class="form-control" name="nota8"  value="{{ $nota->nota8 }}" >
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="dni" class="col-md-2 col-form-label text-md-right">{{ __('PROMEDIO FINAL') }}</label>

                            <div class="col-md-2">
                                <input  type="text" class="form-control"  value="" >
                            </div>
                            <label for="nick" class="col-md-2 col-form-label text-md-right">{{ __('PROMEDIO FINAL') }}</label>
                            <div class="col-md-2">
                                <input  type="text" class="form-control"  value="" >
                            </div>
                             <div class="col-md-2 text-md-center">
                                <button type="submit" class="btn btn-success">Editar</button>
                            </div>
                        </div>
                        @empty
                     <h2>NO HAY DATOS</h2>
                         @endforelse
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
        @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
@endsection
