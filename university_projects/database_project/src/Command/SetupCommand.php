<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Process\Process;

class SetupCommand extends Command
{
    protected static $defaultName = 'app:setup';

    protected function configure()
    {
        $this
            ->setDescription('This command configures project to run');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Building the app');
        $io->warning('We assume that you have configured your .env file');
        $io->progressStart(4);
        $io->newLine();
        $composerInstall = 'composer install';
        $createDB = $this->getApplication()->find('doctrine:database:create');
        $migrateDB = $this->getApplication()->find('doctrine:migrations:migrate');
        $seedDB = $this->getApplication()->find('doctrine:fixtures:load');

        $seedArguments = [
            'command' => 'doctrine:fixtures:load',
        ];
        $createArguments = [
            'command' => 'doctrine:database:create'
        ];
        $migrateArguments = [
            'command' => 'doctrine:migrations:migrate'
        ];

        $commands = [
            $composerInstall,
            $createDB,
            $migrateDB,
            $seedDB
        ];
        $arguments = [
            '',
            $createArguments,
            $migrateArguments,
            $seedArguments
        ];
        $description =
            [
                'Installing dependencies',
                'Creating Database',
                'Migrating Database',
                'Seeding DB with demo data'
            ];

        for($i=0; $i<count($commands); $i++)
        {
            if($i == 0)
            {
                $io->section($description[$i]);
                $io->newLine();
                exec($commands[$i]);
                $io->newLine();
                $io->progressAdvance(1);
                $io->newLine(2);
            }
            else
            {
                $io->section($description[$i]);
                $commands[$i]->run(new ArrayInput($arguments[$i]), $output);
                $io->newLine(2);
                $io->progressAdvance(1);
                $io->newLine(2);
            }
        }
        $io->success('App is successfully build!');
        return 0;
    }
}
