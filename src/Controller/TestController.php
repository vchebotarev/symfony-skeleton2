<?php

namespace App\Controller;

use Chebur\ControllerTraits;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestController
{
    use ControllerTraits\Twig;

    public function __invoke(Request $request): Response
    {
        return $this->render('base.html.twig');
    }
}
