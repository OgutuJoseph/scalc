<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeesController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' =>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('employee_id','desc')->paginate(3);
        return view('employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'salary' => 'required'
        ]);
        //Create Employee
        $employee = new Employee;
        $employee->employee_id = $request->input('employee_id');
        $employee->firstname = $request->input('firstname');
        $employee->lastname= $request->input('lastname');
        $employee->salary = $request->input('salary');
        $employee->user_id = auth()->user()->id;
        $employee->save();

        return redirect('/employees')->with('success', 'Employee Details Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);

        //Check for correct user
        if(auth()->user()->id !==$employee->user_id){
            return redirect('/employees')->with('error', 'Unauthorized Page');   
        }
        return view('employees.edit')->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'salary' => 'required'
        ]);
        //Edit Employee
        $employee = Employee::find($id);
        $employee->employee_id = $request->input('employee_id');
        $employee->firstname = $request->input('firstname');
        $employee->lastname= $request->input('lastname');
        $employee->salary = $request->input('salary');
        $employee->save();

        return redirect('/employees')->with('success', 'Employee Details Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        //Check for correct user
        if(auth()->user()->id !==$employee->user_id){
            return redirect('/employees')->with('error', 'Unauthorized Page');   
        }
        $employee->delete();

        return redirect('/employees')->with('success', 'Employee Deleted');
    }
}
