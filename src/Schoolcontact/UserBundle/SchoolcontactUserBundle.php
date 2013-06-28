<?php

namespace Schoolcontact\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SchoolcontactUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}