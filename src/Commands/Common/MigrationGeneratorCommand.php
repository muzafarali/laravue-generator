<?php

namespace laraVue\Generator\Commands\Common;

use laraVue\Generator\Commands\BaseCommand;
use laraVue\Generator\Common\CommandData;
use laraVue\Generator\Generators\MigrationGenerator;

class MigrationGeneratorCommand extends BaseCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'laravue:migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create migration command';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->commandData = new CommandData($this, CommandData::$COMMAND_TYPE_API);
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        parent::handle();

        if ($this->commandData->getOption('fromTable')) {
            $this->error('fromTable option is not allowed to use with migration generator');

            return;
        }

        $migrationGenerator = new MigrationGenerator($this->commandData);
        $migrationGenerator->generate();

        $this->performPostActionsWithMigration();
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    public function getOptions()
    {
        return array_merge(parent::getOptions(), []);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array_merge(parent::getArguments(), []);
    }
}
