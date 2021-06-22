<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeResource;
use App\Models\Employe;

class EmployeController extends Controller
{
    public function index()
    {
        $employees = Employe::with('company')->get();

        return EmployeResource::collection($employees);
    }
}
