<?php


namespace App\Console\Commands;


use Illuminate\Database\Console\Migrations\BaseCommand;
use Symfony\Component\Console\Input\ArrayInput;

class MigrationCommand extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:my-migration {name : The name of the migration}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the database my migrations';

    public function handle()
    {
        $command = $this->getApplication()->find('make:migration');
        $arguments = [
            'command' => 'make:migration',
            'name' => $this->argument('name'),
            '--realpath'=>app_path('Console/Command/stubs')
        ];


        $input = new ArrayInput($arguments);
        $command->run($input, $this->output);
    }
}
