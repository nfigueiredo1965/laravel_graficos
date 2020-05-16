<?php

namespace App\Http\Controllers\Admin;

use App\Charts\ReportChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ReportRepositoryInterface;
use App\Enum\Enum;


class ChartController extends Controller
{
    protected $repository;
    
    public function __construct(ReportRepositoryInterface $repository){

        $this->repository = $repository;
    }

    

    public function years()
    {
    
        $chart = $this->repository->getReportsByYear();
        return view('admin.charts.chart',compact('chart'));
       // return view('admin.charts.chart_year',compact('chart'));
    }

    public function months()
    {
        //usando o repositorio
        $chart = $this->repository->getReports(2016,2020);
       
                
        return view('admin.charts.chart',compact('chart'));
    }
    public function vue()
    {
        $chart = 1;
        return view('admin.charts.vue',compact('chart'));
    }


}
