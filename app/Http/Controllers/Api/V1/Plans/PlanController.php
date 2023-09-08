<?php

namespace App\Http\Controllers\Api\V1\Plans;

use App\Http\Controllers\Controller;
use App\Models\Plan;

class PlanController extends Controller
{
    public function index()
    {
        return Plan::paginate(10);
    }
}
