<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class RefreshCommand extends Command
{
    protected static $defaultName = 'app:refresh';

    protected function configure()
    {
        $this
            ->setDescription('This command rebuilds/refreshes the app');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Rebuilding the app');
        $io->progressStart(5);
        $io->newLine();

        $updateGit = 'sudo git pull';
        $composerUpdate = 'composer update';
        $dropTables = $this->getApplication()->find('doctrine:schema:drop');
        $migrateDB = $this->getApplication()->find('doctrine:migrations:migrate');
        $seedDB = $this->getApplication()->find('doctrine:fixtures:load');

        $seedArguments = [
            'command' => 'doctrine:fixtures:load',
        ];
        $migrateArguments = [
            'command' => 'doctrine:migrations:migrate'
        ];

        $dropArguments = [
            'command' => 'doctrine:schema:drop',
            '--force' => true,
            '--full-database' => true
        ];

        $commands = [
            $updateGit,
            $composerUpdate,
            $dropTables,
            $migrateDB,
            $seedDB
        ];
        $arguments = [
            '',
            '',
            $dropArguments,
            $migrateArguments,
            $seedArguments
        ];
        $description =
            [
                'Syncing with git',
                'Updating dependencies',
                'Dropping all tables',
                'Migrating Database',
                'Seeding DB with demo data'
            ];

        for($i=0; $i<count($commands); $i++)
        {
            if($i <= 1)
            {
                $io->section($description[$i]);
                $io->newLine();
                echo exec($commands[$i]);
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
        $io->success('App is up to date!');
        return 0;
    }
}
