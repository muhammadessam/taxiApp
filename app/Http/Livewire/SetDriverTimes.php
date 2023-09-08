<?php

namespace App\Http\Livewire;

use App\Models\Admin\Driver;
use App\Models\DriverDay;
use Livewire\Component;

class SetDriverTimes extends Component
{
    public $driver;
    public $days = ['SATURDAY', 'SUNDAY', 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY'];
    public $selected_days = [
        'SATURDAY' => [],
        'SUNDAY' => [],
        'MONDAY' => [],
        'TUESDAY' => [],
        'WEDNESDAY' => [],
        'THURSDAY' => [],
        'FRIDAY' => [],
    ];

    public function mount(Driver $driver)
    {
        $this->driver = $driver;
        foreach ($this->driver->driverDays as $day) {
            $this->selected_days[$day->day_name] = $day->day_time;
        }
    }

    public function addDayTime($day)
    {
        $this->selected_days[$day][] = [
            'from' => '',
            'to' => '',
        ];
    }

    public function removeDayTime($day, $index)
    {
        unset($this->selected_days[$day][$index]);
    }

    public function saveDays()
    {
        $this->driver->driverDays()->delete();
        foreach ($this->selected_days as $day => $times) {
            if (count($times)) {
                DriverDay::create([
                    'driver_id' => $this->driver->id,
                    'day_name' => $day,
                    'day_time' => $times,
                ]);
            }
        }
        return redirect('/drivers')->with('success', trans('succes_messages.driver_times_add_successfully'));
    }

    public function render()
    {

        return view('livewire.set-driver-times');
    }
}
