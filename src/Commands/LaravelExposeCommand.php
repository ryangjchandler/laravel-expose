<?php

namespace RyanChandler\LaravelExpose\Commands;

use Illuminate\Console\Command;

class LaravelExposeCommand extends Command
{
    public $signature = 'laravel-expose';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
