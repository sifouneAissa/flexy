<?php

namespace App\Http\Livewire\Common;

use App\Models\UserNumber;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class ActivityLogCard extends Component
{
    public $item;
    public $activities;
    public $all = false;

    public function mount(){

        if(!$this->all) {
            $this->activities = Activity::where([
                [
                    'subject_type', get_class($this->item)
                ],
                [
                    'subject_id', $this->item->id
                ],
                [
                    'causer_id', auth()->user()->id
                ]
            ])->orderBy('created_at','desc')->get();
        }
        else {

            $this->activities = Activity::where([
                [
                    'subject_type', $this->item
                ],
                [
                    'causer_id', auth()->user()->id
                ]
            ])->orderBy('created_at','desc')->get();

        }


    }

    public function render()
    {
        return view('livewire.common.activity-log-card');
    }
}
