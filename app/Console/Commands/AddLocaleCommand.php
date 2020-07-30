<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class AddLocaleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:locale {locale}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a locale to your project';

    /**
     * Filesystem isntance.
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * Craete new AddLocaleCommand instance.
     *
     * @param  Filesystem $files
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->locale = $this->argument('locale');
        $this->path = resource_path("lang/{$this->locale}");
        $this->configPath = config_path('translatable.php');
        $this->langFilesPath = $this->getLanguageFilesPath();

        if (! realpath($this->langFilesPath)) {
            return $this->error("Could'nt find locale [{$this->locale}]");
        }

        $this->publishLanguageFiles();
        $this->addLocaleToConfig();

        $this->line("Added locale [<info>{$this->locale}</info>].");
    }

    /**
     * Get language translation files path.
     *
     * @return string
     */
    protected function getLanguageFilesPath()
    {
        return base_path("vendor/caouecs/laravel-lang/src/{$this->locale}");
    }

    /**
     * Publish the language files.
     *
     * @return void
     */
    protected function publishLanguageFiles()
    {
        if (realpath($this->path)) {
            return;
        }

        $this->files->ensureDirectoryExists($this->path);

        $this->files->copyDirectory($this->langFilesPath, $this->path);
    }

    /**
     * Add locale to config.
     *
     * @return void
     */
    protected function addLocaleToConfig()
    {
        if (in_array($this->locale, config('translatable.locales'))) {
            return;
        }

        $translatable = $this->files->get($this->configPath);
        $split = explode('[', $translatable)[2];

        $translatable = str_replace($split, "\n\t\t\t'{$this->locale}',{$split}", $translatable);

        $this->files->put($this->configPath, $translatable);
    }
}
