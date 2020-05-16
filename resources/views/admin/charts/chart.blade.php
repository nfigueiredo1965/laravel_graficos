@extends('adminlte::page')

@section('title', 'Gráfico Mensal')

@section('content_header')
    <h1>
       
        Relatório mensal de Vendas
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('chats.months') }}">Gráficos Mensal</a></li>
       
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
    
    {{-- Formatar o eixo Y com valores em Reais --}}
    <script>
        let myCallback = (value, index, values) => numberToReal(value);
      
        let numberToReal = (value) => {
          let number = value.toFixed(2).split('.');
          number[0] = 'R$ ' + number[0].split(/(?=(?:...)*$)/).join('.');
          
          return number.join(',');
        }
      </script>

    @endpush
@stop