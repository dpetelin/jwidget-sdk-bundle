<?php


namespace ISSArt\Bundle\JWidgetBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BuildCommand extends ContainerAwareCommand
{
    public function configure()
    {
        $this->setDefinition(array())
            ->setName('issart:jwidget:build')
            ->setDescription('build jwidget application');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $builder = new \JWSDK_Builder(
                $this->getContainer()->getParameter('kernel.root_dir'),
                $this->getMode(),
                $this->getContainer()->getParameter('issart_jwidget.config_path')
            );

            $builder->buildPages();
            $builder->saveCache();
        } catch (\JWSDK_Exception $e) {
            $output->writeln("ERROR: " . $e->getMessage());
            return 1;
        } catch (\Exception $e) {
            $output->writeln("UNEXPECTED ERROR");
            return 1;
        }

        $output->writeln("Done");
    }

    protected function getMode()
    {
        return $this->getContainer()->getParameter("kernel.environment") == 'prod'
            ? 'release'
            : 'debug';
    }
} 