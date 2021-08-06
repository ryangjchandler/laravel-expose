<?php

namespace RyanChandler\LaravelExpose\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Command\SignalableCommandInterface;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\ExecutableFinder;

class ExposeCommand extends Command implements SignalableCommandInterface
{
    public $signature = 'expose {--subdomain=} {--domain=} {--server=}';

    public $description = 'Share your site via Expose.';

    protected $originalUrl;

    protected $shareUrl;

    public function handle()
    {
        $this->originalUrl = config('app.url');

        $subdomain = $this->option('subdomain') ?: config('expose.subdomain');
        $domain = $this->option('domain') ?: config('expose.domain');
        $server = $this->option('server') ?: config('expose.server');

        $command = [
            (new ExecutableFinder)->find('expose', 'expose', [
                '/usr/local/bin',
                '/opt/homebrew/bin',
            ]),
            'share',
            Str::after($this->originalUrl, '://'),
            '--subdomain='.$subdomain,
            '--domain='.$domain,
            '--server='.$server,
        ];

        $this->shareUrl = 'https://' . $subdomain . '.' . $domain;

        $this->setExposeUrlInEnv();

        $process = new Process(
            command: $command,
            timeout: null,
        );

        $process->setTty(Process::isTtySupported());
        $process->start();

        while ($process->isRunning()) {
            // Do nothing here. More of a safety net so this process runs while Expose does.
        }
    }

    protected function setExposeUrlInEnv()
    {
        (new Filesystem)->replaceInFile(
            'APP_URL='.$this->originalUrl,
            'APP_URL='.$this->shareUrl,
            base_path('.env'),
        );

        Artisan::call('config:clear');
    }

    public function getSubscribedSignals(): array
    {
        return [SIGINT];
    }

    public function handleSignal(int $signal): void
    {
        if ($signal !== SIGINT) {
            return;
        }

        (new Filesystem)->replaceInFile(
            'APP_URL='.$this->shareUrl,
            'APP_URL='.$this->originalUrl,
            base_path('.env'),
        );

        Artisan::call('config:clear');
    }
}
