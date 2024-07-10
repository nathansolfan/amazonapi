<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeService extends Command
{
    protected $signature = 'make:service {name}';
    protected $description = 'Create a new service class';

    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Services/{$name}.php");

        if ($this->files->exists($path)) {
            $this->error("Service {$name} already exists!");
            return;
        }

        $stub = $this->files->get(__DIR__ . '/stubs/service.stub');
        $stub = str_replace('DummyClass', $name, $stub);

        $this->files->put($path, $stub);
        $this->info("Service {$name} created successfully.");
    }
}
