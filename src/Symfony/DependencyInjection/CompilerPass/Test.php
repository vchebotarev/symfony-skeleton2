<?php

declare(strict_types=1);

namespace App\Symfony\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class Test implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        //do something
    }
}
