<?php

namespace Myweb\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MywebUserBundle extends Bundle
{
     public function getParent()
    {
        return 'FOSUserBundle';
    }
}
