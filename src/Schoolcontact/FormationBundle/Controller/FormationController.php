<?php

namespace Schoolcontact\FormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FormationController extends Controller
{
    public function indexAction()
    {
        return $this->render('SchoolcontactFormationBundle:Formation:index.html.twig');
    }
}
