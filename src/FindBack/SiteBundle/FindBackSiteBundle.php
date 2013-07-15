<?php

namespace FindBack\SiteBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class FindBackSiteBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
