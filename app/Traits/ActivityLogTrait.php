<?php

namespace App\Traits;

use Spatie\Activitylog\LogOptions;

trait ActivityLogTrait {

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
        // Chain fluent methods for configuration options
    }
}
