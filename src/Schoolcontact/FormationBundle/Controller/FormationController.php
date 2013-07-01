<?php

namespace Schoolcontact\FormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FormationController extends Controller
{
    public function indexAction()
    {
        return $this->render('SchoolcontactFormationBundle:Formation:index.html.twig');
    }
    public function consulterAction()
    {
        return $this->render('SchoolcontactFormationBundle:Formation:consulter.html.twig');
    }
    public function messagerieAction()
    {
        return $this->render('SchoolcontactFormationBundle:Formation:messagerie.html.twig');
    }
    public function gestionAction()
    {
        return $this->render('SchoolcontactFormationBundle:Formation:gestion.html.twig');
    }
    public function inscriptionEcoleAction()
    {
        return $this->render('SchoolcontactFormationBundle:Formation:inscriptionecole.html.twig');
    }
    public function gestionEcoleAction()
    {
        return $this->render('SchoolcontactFormationBundle:Formation:gestionEcole.html.twig');
    }
    public function monCompteAction()
    {
        return $this->render('SchoolcontactFormationBundle:Formation:monCompte.html.twig');
    }
    public function contactAction()
    {
        return $this->render('SchoolcontactFormationBundle:Formation:contact.html.twig');
    }
}
