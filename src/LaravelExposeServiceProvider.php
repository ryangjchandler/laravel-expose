<?php

namespace RyanChandler\LaravelExpose;

use RyanChandler\LaravelExpose\Commands\ExposeCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelExposeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-expose')
            ->hasConfigFile('expose')
            ->hasCommand(ExposeCommand::class);
    }
}
