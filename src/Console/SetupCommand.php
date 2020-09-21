<?php

namespace Labelworx\ShiftStyles\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SetupCommand extends Command
{
    protected $signature = 'shift:setup';

    protected $description = 'Setup PHP CS Fixer dist file in project root';

    public function handle()
    {
        File::copy(__DIR__ . '/../../stubs/.php_cs.stub', base_path('/.php_cs.dist'));
        $this->info(".php_cs.dist created in project base directory");
    }
}
