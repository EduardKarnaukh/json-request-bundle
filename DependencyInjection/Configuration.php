<?php

namespace SymfonyBundles\JsonRequestBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use SymfonyBundles\JsonRequestBundle\EventListener\RequestTransformerListener;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $builder = new TreeBuilder('sb_json_request');

        $builder->getRootNode()
            ->children()
                ->arrayNode('listener')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('request_transformer')
                            ->defaultValue(RequestTransformerListener::class)
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $builder;
    }
}
