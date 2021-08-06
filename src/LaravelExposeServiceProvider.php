<?php

namespace RyanChandler\LaravelExpose;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use RyanChandler\LaravelExpose\Commands\ExposeCommand;

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
