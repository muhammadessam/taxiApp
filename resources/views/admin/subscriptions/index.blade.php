@extends('admin.layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header d-flex justify-content-between align-items-center">
                        <h1>@lang('pages_names.subscriptions')</h1>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                @if($subscriptions->count())
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>@lang('view_pages.user')</th>
                                            <th>@lang('view_pages.plan')</th>
                                            <th>@lang('view_pages.driver')</th>
                                            <th>@lang('view_pages.start_date')</th>
                                            <th>@lang('view_pages.end_date')</th>
                                            <th>@lang('view_pages.action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($subscriptions as $item)
                                            <tr>
                                                <td>{{$item->user->name}}</td>
                                                <td>{{$item->plan->title}}</td>
                                                <td>{{$item->driver->name??""}}</td>
                                                <td>{{$item->started_at}}</td>
                                                <td>{{$item->ended_at}}</td>
                                                <td class="d-flex">
                                                    <form action="{{route('subscription.delete',$item)}}" method="post" onsubmit="return confirm('@lang("view_pages.delete")')">
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
