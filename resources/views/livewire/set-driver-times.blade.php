<div class="row">
    <div class="col-12">
        <div class="card-header">
            <h3>@lang('view_pages.add_driver_times')</h3>
        </div>
        <div class="row mt-5 justify-content-center">
            @foreach($days as $day)
                <div class="col-3 mt-5 mx-3 card ">
                    <div class="card-header">
                        <h3>{{$day}}</h3>
                        <button wire:click="addDayTime('{{$day}}')" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                    </div>
                    <div class="card-body">
                        @foreach($selected_days[$day]  as $index=>$time)
                            <div class="border border-1 border-secondary px-3 py-5 mt-5 rounded card">
                                <div class="card-header">
                                    <button wire:click="removeDayTime('{{$day}}', '{{$index}}')" class="btn btn-danger"><i class="fa fa-minus"></i></button>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="from-{{$day}}-{{$index}}">@lang('view_pages.from')</label>
                                        <input type="time" class="form-control" id="from-{{$day}}-{{$index}}" wire:model="selected_days.{{$day}}.{{$index}}.from">
                                    </div>
                                    <div class="form-group">
                                        <label for="to-{{$day}}-{{$index}}">@lang('view_pages.to')</label>
                                        <input type="time" class="form-control" id="to-{{$day}}-{{$index}}" wire:model="selected_days.{{$day}}.{{$index}}.to">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-5 container-fluid">
            <div class="col">
                <button class="btn btn-primary float-right" wire:click="saveDays">@lang('view_pages.save')</button>
            </div>
        </div>
    </div>
</div>
