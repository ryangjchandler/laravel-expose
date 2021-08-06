<?php

namespace RyanChandler\LaravelExpose;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use RyanChandler\LaravelExpose\Commands\LaravelExposeCommand;

class LaravelExposeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-expose')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-expose_table')
            ->hasCommand(LaravelExposeCommand::class);
    }
}
