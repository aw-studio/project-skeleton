<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProjectSetup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup new Project.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('fjord:install');
        $this->call('db:seed', [
            '--class' => 'ProjectSetupSeeder',
        ]);
        $this->info('Install npm packages.');
        shell_exec('npm i && npm run dev');
    }
}
