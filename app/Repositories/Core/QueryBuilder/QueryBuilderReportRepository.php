<?php

namespace App\Repositories\Core\QueryBuilder;

use App\Enum\Enum;
use App\Charts\ReportChart;
use Illuminate\Support\Facades\DB;
use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Contracts\ReportRepositoryInterface;


class QueryBuilderReportRepository extends BaseQueryBuilderRepository implements ReportRepositoryInterface
{
    protected $table = 'orders';
    
    //Graficos anuais
    public function byMonths($year):array
    {
        $orders = DB::table($this->table)
        ->select(DB::raw('SUM(total) as tot'), DB::raw('MONTH(date) as mes'))
        ->groupBy(DB::raw('MONTH(date)'))
        ->WhereYear('date',$year)
        ->pluck('tot')
        ->toArray();
        /*
       $dataset = [];
       foreach ($orders as $key => $value) {
        $dataset[] = $value->tot;
       }
       */

      // dd($orders);
        return $orders;
    }
    //Graficos anuais
    public function byYear():array
    {

        $orders = DB::table($this->table)
        ->select(
            DB::raw('SUM(total) as tot'), 
            DB::raw("EXTRACT( YEAR from date ) as ano")
            )
        
        ->groupBy(DB::raw('YEAR(date)'))
        
      
        ->get();
            //gerar cores aleatoria
        $backgrounds = $orders->map(function($value, $key){
           return  '#'.dechex(rand(0x000000,0xFFFFFF));
        });
        $total = $orders->map(function($value, $key){
            return  numberFormat($value->tot,2,'.','');
         });


       //dd($total);
       return [
        'ano' => $orders->pluck('ano'),
        'total' => $total,
        'colors' => $backgrounds,
       
          ];
    }
    
    
  
    //Graficos com historicos mensais
    public function getReports(int $yearStart = null, int $yearEnd = null, string $type = 'bar')
    {
        $yearStart = $yearStart ?? date('Y')-5;

        $yearEnd = $yearEnd ?? date('Y');

        $charts = app(ReportChart::class);

        $charts->labels(Enum::months_abrev());

        for ($year=$yearStart; $year <= $yearEnd ; $year++) { 
            $color = '#'.dechex(rand(0x000000,0xFFFFFF));
            $charts->dataset($year,$type,$this->byMonths($year))
                ->options([
                    'color'=> $color,
                    'backgroundColor' =>  $color,
                ]);
        }
            
        return $charts;
    }

    //Graficos com historicos anuais
    public function getReportsbyYear()
    {
        $charts = app(ReportChart::class);
        $response = $this->byYear();
      
        $charts->labels($response['ano']);
       
        $charts->dataset('Relatório Anual de Vendas','bar',$response['total'])
                ->backgroundColor($response['colors'])
                ->color('red');

        $charts->options([
            'scales' => [
                'yAxes' => [
                    [
                        'ticks' => [
                            'callback' => $charts->rawObject('myCallback')
                        ]
                    ]
                ]
            ]
        ]);        
                
    return $charts;
    }

    public function getReportsMonthbyYear(int $year):array
    {
        $orders = DB::table($this->table)
        ->select(
            DB::raw('SUM(total) as tot'), 
            DB::raw("EXTRACT( MONTH from date ) as mes")
            )
        
        ->groupBy(DB::raw('MONTH(date)'))
        ->whereYear('date',$year)
        
      
        ->get();
            //gerar cores aleatoria
        $backgrounds = $orders->map(function($value, $key){
           return  '#'.dechex(rand(0x000000,0xFFFFFF));
        });
        $total = $orders->map(function($value, $key){
            return  numberFormat($value->tot,2,'.','');
         });


       //dd($total);
       return [
        'labels' => $orders->pluck('mes'),
        'values' => $total,
        'backgrounds' => $backgrounds,
       
          ];
    }


}