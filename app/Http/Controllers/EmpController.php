<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Barryvdh\DomPDF\PDF;

class EmpController extends Controller
{
    public function getAllEmployees()
    {
        $employees = Employee::all();
        return view('employee', compact('employees'));
    }

    public function downloadPDF()
    {
        $employees = Employee::all();
        $pdf = PDF::loadView('employee', compact('employees'));

        return $pdf->download('employee.pdf');
    }
}
