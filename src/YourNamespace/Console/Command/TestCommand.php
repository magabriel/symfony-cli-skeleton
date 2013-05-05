<?php
namespace YourNamespace\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Just a Test command...
 */
class TestCommand extends Command
{
    protected function configure()
    {
        $this->setName('test')
             ->setDescription('Test command')
              ->setHelp('This is the help for the test command.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Testing the application!!!');
        $output->writeln('--> Nothing seems broken (yet...)');

    }
}
