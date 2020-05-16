<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ReportRepositoryInterface;

class ReportsApiController extends Controller
{
    protected $repository;
    public function __construct(ReportRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function Months(Request $request)
    {
        $response = $this->repository->getReportsMonthbyYear(2020);
        return response()->json( $response);
    }
}
