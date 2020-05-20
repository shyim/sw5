<?php declare(strict_types=1);

namespace Shopware\Components\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class PreloadCollectorCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $classes = [];

        foreach ($container->getDefinitions() as $definition) {
            if ($definition->getClass() && class_exists($definition->getClass())) {
                $classes[] = $definition->getClass();
            }
        }

        $container->setParameter('shopware.container.preload_classes', array_keys(array_flip($classes)));
    }
}
