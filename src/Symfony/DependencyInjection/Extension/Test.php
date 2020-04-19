<?php

declare(strict_types=1);

namespace App\Symfony\DependencyInjection\Extension;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class Test extends AbstractExtensionInternal implements CompilerPassInterface
{
    public function load(array $configs, ContainerBuilder $container)
    {
        //do something
    }

    public function process(ContainerBuilder $container)
    {
        //do something or do not implement \Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface
    }
}
