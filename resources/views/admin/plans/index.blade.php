@extends('admin.layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header d-flex justify-content-between align-items-center">
                        <h1>@lang('pages_names.plans')</h1>
                        <div class="col-4 col-md-2 text-left">
                            <div class="col-md-7 text-center text-md-right">
                                <a href="{{route('plans.create')}}" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-plus-circle mr-2"></i>@lang('view_pages.add_plan')
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                @if(\App\Models\Plan::count())
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>@lang('view_pages.logo')</th>
                                            <th>@lang('view_pages.plans_title')</th>
                                            <th>@lang('view_pages.price_per_km')</th>
                                            <th>@lang('view_pages.days')</th>
                                            <th>@lang('view_pages.car_type')</th>
                                            <th>@lang('view_pages.action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach(\App\Models\Plan::all() as $plan)
                                            <tr>
                                                <td>
                                                    <img class="thumbnail rounded-circle w-50 h-50" src="{{$plan->getFirstMediaUrl('plan.logo')}}" alt="">
                                                </td>
                                                <td>{{$plan->title}}</td>
                                                <td>{{$plan->price_per_km}}</td>
                                                <td>{{$plan->days}}</td>
                                                <td>{{$plan->vehicle_type->name ??''}}</td>
                                                <td class="d-flex">
                                                    <a href="{{route('plans.edit', $plan)}}" class="btn btn-secondary mx-3">@lang('view_pages.edit')</a>
                                                    <form action="{{route('plans.destroy', $plan)}}" method="post" onsubmit="return confirm('@lang("view_pages.delete")')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">@lang('view_pages.delete')</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="row">
                                        <div class="col-12 text-center p-10">
                                            <h4 class="p-10">No data to display</h4>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
