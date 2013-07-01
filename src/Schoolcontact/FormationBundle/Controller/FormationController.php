<?php

namespace Schoolcontact\FormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Schoolcontact\FormationBundle\Form\AddEcoleType;
use Schoolcontact\FormationBundle\Form\AddUsersType;
use Schoolcontact\FormationBundle\Form\AddFormationType;
use Schoolcontact\FormationBundle\Entity\Departement;
use Schoolcontact\FormationBundle\Entity\Diplome;
use Schoolcontact\FormationBundle\Entity\Ecole;
use Schoolcontact\FormationBundle\Entity\Formation;
use Schoolcontact\FormationBundle\Entity\Region;
use Schoolcontact\FormationBundle\Entity\Ville;
use Schoolcontact\UserBundle\Entity\User;

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
    public function gestionecoleAction(Request $request)
    {
        //création d'un nouveau post
        $ecole = new Ecole();
        //création du fomrulaire
        $form = $this->createForm(new AddEcoleType(), $ecole);
        //Test pour savoir si méthode post
        if ($request->isMethod('POST')) {
            //On récupère les données de la requête dans la form
            $form->bind($request);
            //On test si les données son ok
            if ($form->isValid()) {
                //Sauvegarde dans la base de donnée
                $em = $this->getDoctrine()->getManager();
                $em->persist($ecole);
                $em->flush();
            }
        }
        return $this->render('SchoolcontactFormationBundle:Formation:gestionecole.html.twig', array('form' => $form->createView()));
    }
    public function gestionusersAction()
    {
        //création d'un nouveau post
        $user = new User();
        //création du fomrulaire
        $form = $this->createForm(new AddUsersType(), $user);
        //Test pour savoir si méthode post
        if ($request->isMethod('POST')) {
            //On récupère les données de la requête dans la form
            $form->bind($request);
            //On test si les données son ok
            if ($form->isValid()) {
                //Sauvegarde dans la base de donnée
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
            }
        }
        return $this->render('SchoolcontactFormationBundle:Formation:gestionusers.html.twig', array('form' => $form->createView()));
    }
    public function gestionformationAction()
    {
        //création d'un nouveau post
        $formation = new Formation();
        //création du fomrulaire
        $form = $this->createForm(new AddFormationType(), $formation);
        //Test pour savoir si méthode post
        if ($request->isMethod('POST')) {
            //On récupère les données de la requête dans la form
            $form->bind($request);
            //On test si les données son ok
            if ($form->isValid()) {
                //Sauvegarde dans la base de donnée
                $em = $this->getDoctrine()->getManager();
                $em->persist($formation);
                $em->flush();
            }
        }
        return $this->render('SchoolcontactFormationBundle:Formation:gestionformation.html.twig', array('form' => $form->createView()));
    }
    public function moncompteAction()
    {
        return $this->render('SchoolcontactFormationBundle:Formation:monCompte.html.twig');
    }
    public function contactAction()
    {
        return $this->render('SchoolcontactFormationBundle:Formation:contact.html.twig');
    }
}
