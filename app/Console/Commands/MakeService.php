<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Filesystem\Filesystem as FilesystemFilesystem;

class MakeService extends Command
{
    
    protected $signature = 'app:make-service';
    protected $description = 'Command description';

    protected $files;

    public function __construct(FilesystemFilesystem $files)
    {
        parent::__construct();
        $this->files = $files;        
    }

    public function handle()
    {
        //
        $name = $this->argument('name');
        $path = app_path("Services/{$name}.php");
        
        if($this->files->exists($path)){
            $this->error("Service {$name} already exist");
            return;
        }

        $stub = $this->files->get(__DIR__ . '/stubs/service.stub');
        $stub = str_replace('Dummy Class', $name, $stub);

        $this->files->put($path, $stub);
        $this->info("Service {$name} created successfully.");
    }
}
