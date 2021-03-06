<?php

namespace Bnbc\UploadBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('bnbc_upload');

        $rootNode
            ->children()
                ->scalarNode('max_file_size')->defaultNull()->end()
                ->scalarNode('accept_file_types')->defaultValue('/.+$/i')->end()
                ->scalarNode('upload_folder')->defaultValue('uploads')->end()
                ->arrayNode('image_versions')
                    ->children()
                        ->arrayNode('thumbnail')
                            ->children()
                                ->scalarNode('max_width')->defaultNull()->end()
                                ->scalarNode('max_height')->defaultNull()->end()
                                ->booleanNode('crop')->defaultFalse()->end()
                            ->end()
                        ->end()
                        ->arrayNode('medium')
                            ->children()
                                ->scalarNode('max_width')->defaultNull()->end()
                                ->scalarNode('max_height')->defaultNull()->end()
                                ->booleanNode('crop')->defaultFalse()->end()
                            ->end()
                        ->end()
                        ->arrayNode('large')
                            ->children()
                                ->scalarNode('max_width')->defaultNull()->end()
                                ->scalarNode('max_height')->defaultNull()->end()
                                ->booleanNode('crop')->defaultFalse()->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
