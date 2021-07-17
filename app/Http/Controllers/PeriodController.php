<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::all();
        $data = compact(
            'periods'
        );
        return view('period.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('period.create');
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
            'month_year' => 'required|unique:periods',
            'description' => 'required',
        ]);

        $month = date('F', strtotime($request->month_year));
        $year = date('Y', strtotime($request->month_year));
        $period= Period::create([
            'month_year'=>$request->month_year,
            'month'=>$month,
            'year'=>$year,
            'description'=>$request->description,
        ]);

        return redirect('/period')->with('status', 'Period Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        return view('period.edit', compact('period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Period $period)
    {
        $request->validate([
            'month_year' => 'required',
            'description' => 'required',
        ]);

        $month = date('F', strtotime($request->month_year));
        $year = date('Y', strtotime($request->month_year));
        $period->update([
            'month_year'=>$request->month_year,
            'month'=>$month,
            'year'=>$year,
            'description'=>$request->description,
        ]);

        return redirect('/period')->with('status', 'Period Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        $period->delete();
        return redirect('/period')->with('status', 'Period Deleted!');
    }
}
