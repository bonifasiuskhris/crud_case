<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Employee;
use App\Models\EmployeeComponentRelation;
use App\Models\Period;
use App\Models\PeriodEmployeeRelation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::with(['employees'])->has('employees')->get();
        $employees = Employee::with(['components','periods'])->has('periods')->get();
        $employeeComponents = EmployeeComponentRelation::all();
        $data = compact(
            'periods',
            'employees',
            'employeeComponents'
        );
        return view('dashboard', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $periods = Period::all();
        $components = Component::all();
        $data = compact(
            'periods',
            'components',
        );
        return view('create', $data);
    }

    public function employee_list(Request $request)
    {
        $period_id = $request->period_id;
        $period = Period::find($period_id);
        $usedEmployees = EmployeeComponentRelation::when($period_id, function ($query, $period_id) {
            return $query->where('period_id', $period_id);
        })->get('employee_id');
        $employees = Employee::whereNotIn('id', $usedEmployees->pluck('employee_id'))->get();
        $option='';
        foreach ($employees as $value) {
            $option .= '<option value="' . $value->id . '">' . $value->emp_id . ' - ' . $value->full_name . '</option>';
        }

        return compact('option','period');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'period_id' => 'required',
            'period_month_year' => 'required|date|after_or_equal:'.date('Y-m').'',
            'employee_id' => 'required',
            'component_id' => 'required',
            'current_amount' => 'required',
            'new_amount' => 'required',
        ]);

        $PeriodEmployee= PeriodEmployeeRelation::create([
            'period_id'=>$request->period_id,
            'employee_id'=>$request->employee_id,
        ]);

        foreach($request->component_id as $i=>$cmp){
            $EmployeeComponent= EmployeeComponentRelation::create([
                'period_id'=>$request->period_id,
                'employee_id'=>$request->employee_id,
                'component_id'=>$request->component_id[$i],
                'current_amount'=>$request->current_amount[$i],
                'new_amount'=>$request->new_amount[$i],
            ]);
        }

        return redirect('/')->with('status', 'Payroll Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $period_id = $request->query('period');
        $employee_id = $request->query('employee');

        $period= Period::findOrFail($period_id);
        $employeeComponent = EmployeeComponentRelation::where('period_id', $period_id)
                                                        ->where('employee_id', $employee_id)
                                                        ->with(['employee'])
                                                        ->get();

        $employee= Employee::findOrFail($employee_id);
        $components = Component::all();
        $data = compact(
            'period_id',
            'employee_id',
            'employeeComponent',
            'period',
            'employee',
            'components',
        );
        return view('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'period_id' => 'required',
            'employee_id' => 'required',
            'component_id' => 'required',
            'current_amount' => 'required',
            'new_amount' => 'required',
        ]);

        $PeriodEmployee= PeriodEmployeeRelation::where('period_id', $request->period_id)
                                            ->where('employee_id', $request->employee_id)
                                            ->update([
                                                'period_id'=>$request->period_id,
                                                'employee_id'=>$request->employee_id,
                                            ]);

        foreach($request->component_id as $i=>$cmp){
            $EmployeeComponent= EmployeeComponentRelation::where('period_id', $request->period_id)
                                                ->where('employee_id', $request->employee_id)
                                                ->update([
                                                    'period_id'=>$request->period_id,
                                                    'employee_id'=>$request->employee_id,
                                                    'component_id'=>$request->component_id[$i],
                                                    'current_amount'=>$request->current_amount[$i],
                                                    'new_amount'=>$request->new_amount[$i],
                                                ]);
        }

        return redirect('/')->with('status', 'Payroll Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $period_id = $request->query('period');
        $employee_id = $request->query('employee');

        PeriodEmployeeRelation::where('period_id', $period_id)
                            ->where('employee_id', $employee_id)
                            ->delete();

        EmployeeComponentRelation::where('period_id', $period_id)
                            ->where('employee_id', $employee_id)
                            ->delete();

        return redirect('/')->with('status', 'Payroll Deleted!');
    }
}
