<?php

declare(strict_types=1);

namespace App\Symfony\DependencyInjection\Extension;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Extension\Extension;

abstract class AbstractExtensionInternal extends Extension
{
    public function getAlias()
    {
        return Container::underscore(str_replace('\\', '', get_class($this)));
    }
}
