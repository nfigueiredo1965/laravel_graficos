@extends('adminlte::page')

@section('title', 'Gráfico Anual')

@section('content_header')
    <h1>
       
        Relatório VUE JS
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('chats.vue') }}">Gráfico vue</a></li>
       
    </ol>
@stop

@section('content')

    <div class="content row">

     
        <div class="box box-success">
            <div class="box-body">
                @include('admin.includes.alerts')
               <report-months>


               </report-months>
             
            </div>
        </div>
      
       
    </div>

  
@stop

@push('js')
<script src="{{url('js/app.js')}}"></script>
@endpush