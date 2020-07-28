<?php

use FjordApp\Config\Pages\RootConfig;
use FjordPages\Models\FjordPage;
use Illuminate\Database\Seeder;

class ProjectSetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createGeneralPages();
    }

    protected function createGeneralPages()
    {
        FjordPage::firstOrCreate(['collection' => 'root', 'title' => 'Impressum'], [
            'config_type' => RootConfig::class,
            'de'          => ['t_title' => 'Impressum'],
            'en'          => ['t_title' => 'Imprint'],
        ]);

        FjordPage::firstOrCreate(['collection' => 'root', 'title' => 'Datenschutz'], [
            'config_type' => RootConfig::class,
            'de'          => ['t_title' => 'Datenschutz'],
            'en'          => ['t_title' => 'Datapolicy'],
        ]);
    }
}
