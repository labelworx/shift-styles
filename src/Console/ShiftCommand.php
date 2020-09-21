<?php

namespace Labelworx\ShiftStyles\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Exception\ProcessSignaledException;
use Symfony\Component\Process\Process;

class ShiftCommand extends Command
{
    protected $signature = 'shift';

    protected $description = 'Fix code to Laravel Shift ruleset';

    public function handle()
    {
        $this->ensureDistFileExists();

        $process = (new Process(array_merge($this->binary(), [ 'fix' ])))->setTimeout(null);

        try {
            return $process->run(function ($type, $line) {
                $this->output->write($line);
            });
        } catch (ProcessSignaledException $e) {
            if (extension_loaded('pcntl') && $e->getSignal() !== SIGINT) {
                throw $e;
            }
        }
    }

    protected function binary()
    {
        $command = 'vendor/bin/php-cs-fixer';

        if ('phpdbg' === PHP_SAPI) {
            return [PHP_BINARY, '-qrr', $command];
        }

        return [PHP_BINARY, $command];
    }

    protected function ensureDistFileExists()
    {
        if (! File::exists(base_path('/.php_cs.dist'))) {
            File::copy(__DIR__ . '/../../stubs/.php_cs.stub', base_path('/.php_cs.dist'));
        }
    }
}
