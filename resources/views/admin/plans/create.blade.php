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
                                <a href="{{route('plans.index')}}" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-view-list mr-2"></i>@lang('view_pages.all')
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <form action="{{route('plans.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="title">@lang('view_pages.plans_title')</label>
                                                <input class="form-control" type="text" required name="title" id="title" value="{{old('title', '')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="price_per_km">@lang('view_pages.price_per_km')</label>
                                                <input class="form-control" type="number" required min="0" step="0.1" name="price_per_km" id="price_per_km" value="{{old('price_per_km', '')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="days">@lang('view_pages.days')</label>
                                                <input class="form-control" type="number" required min="1" step="1" name="days" id="days" value="{{old('days', '')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="vehicle_type_id">@lang('view_pages.car_type')</label>
                                                <select class="form-control" name="vehicle_type_id" id="vehicle_type_id">
                                                    @foreach(\App\Models\Admin\VehicleType::all() as $type)
                                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="logo">@lang('view_pages.banner-image')</label>
                                                <input class="form-control" required type="file" name="logo" id="logo" value="{{old('logo', '')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn btn-primary" type="submit">@lang('view_pages.save')</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
