<?php

//formatação de datas e horas na função helper


function formatDateAndTime($value, $format = 'd/m/Y')
{
    // Utiliza a classe de Carbon para converter ao formato de data ou hora desejado
    return Carbon\Carbon::parse($value)->format($format);
}

//formatação de números na função helper

function numberFormat($value,$nuncasa='2',$sep_decimal=',',$sep_milhar='.'){
   
    return number_format($value,$nuncasa,$sep_decimal,$sep_milhar);
}

function getMethod_middleware(){
    $url_metodo = __METHOD__;
        $metodo = explode( "\\" , $url_metodo);
        $nome_metodo = end($metodo);
        $nome = str_replace('::', '_',$nome_metodo);
        $nome = str_replace('Controller', '',$nome);
        dd($nome);
        $class = get_class();
        $url_class = explode( "\\" , $class);
        $class_name = end($url_class);
        dd($class_name);
}


