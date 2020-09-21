<?php

namespace Labelworx\ShiftStyles;

use Illuminate\Support\ServiceProvider;
use Labelworx\ShiftStyles\Console\ShiftCommand;
use Labelworx\ShiftStyles\Console\SetupCommand;

class ShiftServiceProvider extends ServiceProvider
{
    public function boot() {
        if ($this->app->runningInConsole()) {
            $this->commands([
                SetupCommand::class,
                ShiftCommand::class
            ]);
        }
    }

    public function register()
    {
        parent::register();
    }
}