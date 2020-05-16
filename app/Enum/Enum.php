<?php

namespace App\Enum;

class Enum
{

    public static function months_abrev()
    {
        return ['JAN', 'FEV', 'MAR','ABR','MAI', 'JUN','JUL', 'AGO','SET','OUT','NOV','DEZ'];
    }
    public static function months_complet()
    {
        return [
            'JANEIRO', 
            'FEVEREIRO', 
            'MARÇO',
            'ABRIL',
            'MAIO', 
            'JUNHO',
            'JULHO', 
            'AGOSTO',
            'SETRETEMBRO',
            'OUTUBRO',
            'NOVEMBRO',
            'DEZEMBRO'
            ];
    }
}