<?php

namespace App\Http\Controllers;

use App\Models\Employee\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EmployeeListController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Datatables::of(Employee::query())
            ->addColumn('action', function ($employee) {
                $button = '<div class="d-flex">';
                $button .= '<a href="' . route('employees.edit', $employee). '" class="btn btn-primary mr-3"><i class="fa fa-edit fa-fw"></i></a>';
                $button .= '<a href="#deleteModal" data-target="deleteModal" data-toggle="modal" data-id="' . $employee->id . '" class="btn btn-danger deleteButton"><i class="fas fa-trash-alt"></i></a>';
                $button .= '</div>';

                return $button;
            })
            ->addColumn('photo', function (Employee $employee) {
                $src = $employee->getAvatarPath();

                return '<div><img src="' . $src . '" alt="" style="width: 40px; border-radius: 50%;"></div>';
            })
            ->addColumn('position', function (Employee $employee) {
                return $employee->getPositionName();
            })
            ->editColumn('date_of_employment', function (Employee $employee) {
                return Carbon::parse($employee->date_of_employment)->format('d.m.Y');
            })
            ->editColumn('salary', function (Employee $employee) {
                return '$' . $employee->salary;
            })
            ->rawColumns(['action', 'photo'])
            ->make(true);
    }
}
