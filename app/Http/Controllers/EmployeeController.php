<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\CreateRequest;
use App\Models\Employee\Employee;
use App\Models\Position\Position;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.index');
    }

    public function create()
    {
        $positions = Position::pluck('name', 'id');
        $heads = Employee::pluck('full_name', 'id');

        return view('employee.create', compact('positions', 'heads'));
    }

    public function store(CreateRequest $request)
    {
        $employee = Employee::create($request->validated());

        if ($file = $request->file('image')) {
            $image = ImageRepository::upload($file);

            $employee->image_id = $image->id;
            $employee->save();
        }

        return redirect(route('employees.index'));
    }

    public function edit(Employee $employee)
    {
        $positions = Position::pluck('name', 'id');
        $heads = Employee::pluck('full_name', 'id');

        return view('employee.edit', compact('employee', 'positions', 'heads'));
    }

    public function update(Request $request, Employee $employee)
    {
        //
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
    }
}
