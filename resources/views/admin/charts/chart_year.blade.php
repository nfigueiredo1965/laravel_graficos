@extends('adminlte::page')

@section('title', 'Gráfico Anual')

@section('content_header')
    <h1>
       
        Relatório anual de Vendas
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('chats.years') }}">Gráfico Anual</a></li>
       
    </ol>
@stop

@section('content')

    <div class="content row">

     
        <div class="box box-success">
            <div class="box-body">
                @include('admin.includes.alerts')
                {!! $chart->container() !!}
             
            </div>
        </div>
      
       
    </div>

    @push('js')
    {!! $chart->script() !!}
    @endpush
@stop