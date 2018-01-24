<?php

namespace NTI\MetricsBundle\Command;

use NTI\MetricsBundle\Service\NTIMetrics;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class SendMetric extends Command
{

    protected function configure()
    {
        $this
            ->setName('send:count')
            ->setDescription('Send count variable to a statsD server')
            ->addArgument('variable', InputArgument::OPTIONAL, 'variable to count')
            ->addOption('host', 'H', InputOption::VALUE_OPTIONAL, 'StatsD server hostname or IP [default: localhost]')
            ->addOption('port', 'p', InputOption::VALUE_OPTIONAL, 'StatsD server port [default: 8125]')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $host = $input->getOption('host') ?? 'localhost';
        $port = $input->getOption('port') ?? '8125';

        $variable = $input->getArgument('variable');

        if (!$variable){
            $output->writeln("Variable hasn't been set");
            exit();
        }

        $metric = new NTIMetrics($host,$port);
        $metric->increment($variable);
        $metric->flush();

        $output->writeln('<info>The variable has been incremented</info>');

    }
}