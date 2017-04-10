<?php

namespace Sbe\Contacts\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Command for executing cron jobs
 */
class ContactsCommand extends Command
{
    protected function configure()
    {
        $this->setName('sbe:contacts')->setDescription('Prints hello world.');
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Hello World!');
    }
}