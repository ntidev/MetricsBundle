<?php

namespace NTI\MetricsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class NTIMetricsExtension extends Extension
{


    private $defaultConfiguration = array(
        'host' => 'localhost',
        'port' => '8125',
        'prefix' => ''
    );

    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');

        if (isset($config['host'])) {
           $this->defaultConfiguration['host'] = $config['host'];
        }

        if (isset($config['port'])) {
            $this->defaultConfiguration['port'] = $config['port'];
        }

        if (isset($config['prefix'])) {
            $this->defaultConfiguration['prefix'] = $config['prefix'];
        }

        $container->setParameter('nti_metrics.host', $this->defaultConfiguration['host']);
        $container->setParameter('nti_metrics.port', $this->defaultConfiguration['port']);
        $container->setParameter('nti_metrics.prefix', $this->defaultConfiguration['prefix']);

    }
}
