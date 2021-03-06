<?php

namespace Schoolcontact\FormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Schoolcontact\FormationBundle\Entity\Departement;
use Schoolcontact\FormationBundle\Entity\Diplome;
use Schoolcontact\FormationBundle\Entity\Ecole;
use Schoolcontact\FormationBundle\Entity\Formation;
use Schoolcontact\FormationBundle\Entity\Region;
use Schoolcontact\FormationBundle\Entity\Ville;
use Schoolcontact\UserBundle\Entity\Domaine;
use Schoolcontact\UserBundle\Entity\User;

use Schoolcontact\FormationBundle\Form\AddEcoleType;
use Schoolcontact\FormationBundle\Form\AddUsersType;
use Schoolcontact\FormationBundle\Form\AddFormationType;

class FormationController extends Controller
{
    public function indexAction(){

        return $this->render('SchoolcontactFormationBundle:Formation:index.html.twig');
    
    }

    public function listFormationDomaineAction(Domaine $domaine){

        $repository = $this->getDoctrine()->getManager()->getRepository('SchoolcontactFormationBundle:Formation');

        $formations = $repository->findBy(array('domaine' => $domaine));
        
        return $this->render('SchoolcontactFormationBundle:Formation:viewFormation.html.twig', array('formations' => $formations));
    
    }

    public function listEcoleDomaineAction(Domaine $domaine){

        $repository = $this->getDoctrine()->getManager()->getRepository('SchoolcontactFormationBundle:Formation');

        $formations = $repository->findBy(array('domaine' => $domaine));
        
        return $this->render('SchoolcontactFormationBundle:Formation:listEcoleDomaine.html.twig', array('formation' => $formation));
    
    }

    public function listFormationAction(){

        $repository = $this->getDoctrine()->getManager()->getRepository('SchoolcontactFormationBundle:Formation');

        $formations = $repository->myFindAll();
        
        return $this->render('SchoolcontactFormationBundle:Pages:liste.html.twig', array('formations' => $formations));
    
    }

    public function viewFormationAction($id){

        $repository = $this->getDoctrine()->getManager()->getRepository('SchoolcontactFormationBundle:Formation');

        $formation = $repository->findOneById($id);
        
        return $this->render('SchoolcontactFormationBundle:Pages:view.html.twig', array('formation' => $formation));
    
    }


    /********** Actions de Recherche Formations ***********/

    public function listFormationRegionAction(Region $region){

        $repository = $this->getDoctrine()->getManager()->getRepository('SchoolcontactFormationBundle:Formation');

        $formations = $repository->getFormationsParRegion($region->getId());
        
        return $this->render('SchoolcontactFormationBundle:Pages:liste.html.twig', array('formations' => $formations));
    
    }

    public function listFormationDepartementAction(Departement $departement){

        $repository = $this->getDoctrine()->getManager()->getRepository('SchoolcontactFormationBundle:Formation');

        $formations = $repository->getFormationsParDepartements($departement->getId());
        
        return $this->render('SchoolcontactFormationBundle:Pages:liste.html.twig', array('formations' => $formations));
    
    }

    public function listFormationVilleAction(Ville $ville){

        $repository = $this->getDoctrine()->getManager()->getRepository('SchoolcontactFormationBundle:Formation');

        $formations = $repository->findBy(array('ville' => $ville));
        
        return $this->render('SchoolcontactFormationBundle:Formation:viewFormation.html.twig', array('formation' => $formation));
    
    }

    public function listFormationEcoleAction(Ecole $ecole){

        $repository = $this->getDoctrine()->getManager()->getRepository('SchoolcontactFormationBundle:Formation');

        $formations = $repository->findBy(array('ecole' => $ecole));
        
        return $this->render('SchoolcontactFormationBundle:Formation:viewFormation.html.twig', array('formation' => $formation));
    
    }

    public function listFormationRechercheAction(Region $c, Departement $departement, Ville $ville, Ecole $ecole){

        $repository = $this->getDoctrine()->getManager()->getRepository('SchoolcontactFormationBundle:Formation');

        $recherche = array();
        if( isset($region) AND $region)


        $formations = $repository->findAll();
        
        return $this->render('SchoolcontactFormationBundle:Formation:viewFormation.html.twig', array('formation' => $formation));
    
    }








    public function annuaireAction()
    {
        $regions = $this->getDoctrine()
            ->getRepository('SchoolcontactFormationBundle:Region')
            ->findAll();

        if (!$regions) {
            throw $this->createNotFoundException(
                'No Region found'
            );
        }
        
        $departements = $this->getDoctrine()
            ->getRepository('SchoolcontactFormationBundle:Departement')
            ->findAll();

        if (!$departements) {
            throw $this->createNotFoundException(
                'No Departement found'
            );
        }

        return $this->render('SchoolcontactFormationBundle:Pages:annuaire.html.twig',
            array('regions' => $regions, 'departements' => $departements)
        );
    }

    public function ajaxVilleIdAction($id)
    {
        $villes = $this->getDoctrine()
            ->getRepository('SchoolcontactFormationBundle:Ville')
            ->findVilleByID($id);

        return new Response(json_encode($villes));
    }

    public function consulterAction()
    {
        return $this->render('SchoolcontactFormationBundle:Pages:consulter.html.twig');
    }

    public function messagerieAction()
    {
        return $this->render('SchoolcontactFormationBundle:Pages:messagerie.html.twig');
    }

    public function accueilAction()
    {
        return $this->render('SchoolcontactFormationBundle:Pages:accueil.html.twig');
    }

    public function gestionAction()
    {
        return $this->render('SchoolcontactFormationBundle:Pages:gestion.html.twig');
    }

    public function inscriptionEcoleAction()
    {
        return $this->render('SchoolcontactFormationBundle:Pages:inscriptionecole.html.twig');
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
        return $this->render('SchoolcontactFormationBundle:Pages:gestionecole.html.twig', array('form' => $form->createView()));
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
        return $this->render('SchoolcontactFormationBundle:Pages:gestionusers.html.twig', array('form' => $form->createView()));
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
        return $this->render('SchoolcontactFormationBundle:Pages:gestionformation.html.twig', array('form' => $form->createView()));
    }

    public function moncompteAction()
    {
        return $this->render('SchoolcontactFormationBundle:Pages:monCompte.html.twig');
    }

    public function contactAction()
    {
        return $this->render('SchoolcontactFormationBundle:Pages:contact.html.twig');
    }
    public function visiteAction()
    {
        return $this->render('SchoolcontactFormationBundle:Pages:visite.html.twig');
    }
}
