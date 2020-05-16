<?php

namespace App\Repositories\Contracts;

interface ReportRepositoryInterface
{
    public function byMonths($year):array;
    public function byYear():array;
  
    public function getReportsbyYear();
    
    public function getReports(int $yearStart = null, int $yearEnd = null, string $type = 'bar');

    public function getReportsMonthbyYear(int $year):array;
}
