<?php

namespace App\Http\Controllers;

use App\Models\HolidayPlans;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HolidayPlansController extends Controller
{
    public function index()
    {
        return HolidayPlans::all();
    }
    public function show($id)
    {
        return HolidayPlans::findOrFail($id);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'location' => 'required',
        ]);
        return response()->json(HolidayPlans::create($request->all()), 201);
    }
    public function update(Request $request, $id)
    {
        $holidayPlan = HolidayPlans::findOrFail($id);
        $holidayPlan->update($request->all());
        return $holidayPlan;
    }
    public function destroy($id)
    {
        $holidayPlan = HolidayPlans::findOrFail($id);
        $holidayPlan->delete();
        return response()->json(null, 204);
    }
    public function generatePDF(HolidayPlans $plan)
    {
        $pdf = PDF::loadView('pdf.holiday-plan', compact('plan'));
        return $pdf->download('holiday-plan.pdf');
    }
}
