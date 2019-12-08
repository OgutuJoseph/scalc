<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NetIncome;

class NetIncomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $net_incomes = NetIncome::orderBy('employee_id','desc')->paginate(3);
        return view('net_incomes.index')->with('net_incomes', $net_incomes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('net_incomes.create');
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
            'salary' => 'required'
        ]);
        //Post Salary
        $net_income = new NetIncome;
        $net_income->employee_id = $request->input('employee_id');
        $net_income->salary = $request->input('salary');
        $net_income->save();

        return redirect('/net_incomes')->with('success', 'Salary Posted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $net_income = NetIncome::find($id);
        return view('net_incomes.show')->with('net_income', $net_income);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $net_income = NetIncome::find($id);
        return view('net_incomes.edit')->with('net_income', $net_income);
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
            'salary' => 'required'
        ]);
        //Edit Salary
        $net_income = NetIncome::find($id);
        $net_income->employee_id = $request->input('employee_id');       
        $net_income->salary = $request->input('salary');
        $net_income->save();

        return redirect('/net_incomes')->with('success', 'Salary Details Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $net_income = NetIncome::find($id);      
        $net_income->delete();

        return redirect('/net_incomes')->with('success', 'Salary Detials Deleted');
    }
}
