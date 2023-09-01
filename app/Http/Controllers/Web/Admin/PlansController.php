<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    public function index()
    {
        $main_menu = 'plans';
        $sub_menu = '';
        return view('admin.plans.index', compact('main_menu', 'sub_menu'));
    }

    public function create()
    {
        $main_menu = 'plans';
        $sub_menu = '';
        return view('admin.plans.create', compact('main_menu', 'sub_menu'));
    }

    public function edit(Request $request, Plan $plan)
    {
        $main_menu = 'plans';
        $sub_menu = '';
        return view('admin.plans.edit', compact('plan', 'main_menu', 'sub_menu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'days' => 'required|integer',
            'price_per_km' => 'required|numeric',
            'vehicle_type_id' => 'required|exists:vehicle_types,id',
        ]);
        $plan = Plan::create($request->all());
        if ($request->hasFile('logo'))
            $plan->addMediaFromRequest('logo')->toMediaCollection('plan.logo');
        return redirect()->route('plans.index')->with('success', trans('succes_messages.plan_added_successfully'));
    }

    public function update(Request $request, Plan $plan)
    {
        $main_menu = 'plans';
        $sub_menu = '';
        $plan->update($request->all());
        if ($request->hasFile('logo'))
            $plan->addMediaFromRequest('logo')->toMediaCollection('plan.logo');
        return redirect()->route('plans.index')->with('success', trans('succes_messages.plan_updated_successfully'));
    }

    public function destroy(Request $request, Plan $plan)
    {
        $plan->delete();
        return redirect()->back()->with('success', trans('succes_messages.plan_deleted_successfully'));
    }

}
