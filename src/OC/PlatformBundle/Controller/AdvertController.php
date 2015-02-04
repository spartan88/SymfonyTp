<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use OC\PlatformBundle\Bigbrother\BigbrotherEvents;
use OC\PlatformBundle\Bigbrother\MessagePostEvent;
use OC\PlatformBundle\Entity\Advert;
use OC\PlatformBundle\Form\AdvertEditType;
use OC\PlatformBundle\Form\AdvertType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class AdvertController extends Controller
{
  public function indexAction($page,$nbPerPage)
  {
      
      
    if ($page < 1) {
      throw $this->createNotFoundException("La page ".$page." n'existe pas.");
    }

    $listAdverts = $this->getDoctrine()
      ->getManager()
      ->getRepository('OCPlatformBundle:Advert')
      ->getAdverts($page,$nbPerPage)
    ;

    $nbPages = ceil(count($listAdverts)/$nbPerPage);
    
    if ($page > $nbPages) {
      throw $this->createNotFoundException("La page ".$page." n'existe pas.");
    }
    
    // L'appel de la vue ne change pas
    return $this->render('OCPlatformBundle:Advert:index.html.twig', array(
      'listAdverts' => $listAdverts,
      'page'        => $page,
      'nbPerPage'   => $nbPerPage,
      'nbPages'     => $nbPages
    ));
  }

/**
 * @ParamConverter("advert",      options={"mapping": {"advert_id": "id"})
 */
  public function viewAction(Advert $advert)
  {
//  $em = $this->getDoctrine()->getManager();
//
//    // On récupère la liste des advertSkill pour l'annonce $advert
//    $listAdvertSkills = $em->getRepository('OCPlatformBundle:AdvertSkill')->findByAdvert($advert);
    $listAdvertSkills = $advert->getSkills();
    // Puis modifiez la ligne du render comme ceci, pour prendre en compte les variables :
    return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
      'advert'           => $advert,
      'listAdvertSkills' => $listAdvertSkills,
    ));
  }

  
   // @Security("has_role('ROLE_AUTEUR')")
   
  public function addAction(Request $request)
  {
    
    $em = $this->getDoctrine()->getManager();
    $user = $em->getRepository('OCUserBundle:User')->find($this->getUser()->getId());
      
    $advert = new Advert;
    $advert->setUser($user);
    
    $form = $this->createForm(new AdvertType(), $advert);
    
    
    // On vérifie que les valeurs entrées sont correctes
    // (Nous verrons la validation des objets en détail dans le prochain chapitre)
    if ($form->handleRequest($request)->isValid()) {
        
      $event = new MessagePostEvent($advert->getContent(), $advert->getUser());  
 
      $this
        ->get('event_dispatcher')
        ->dispatch(BigbrotherEvents::onMessagePost, $event)
      ;
      
      $advert->setContent($event->getMessage());
      
      // On l'enregistre notre objet $advert dans la base de données, par exemple
      $em = $this->getDoctrine()->getManager();
      $em->persist($advert);
      $em->flush();

      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

      // On redirige vers la page de visualisation de l'annonce nouvellement créée
      return $this->redirect($this->generateUrl('oc_platform_view', array('id' => $advert->getId())));
    }

    // À ce stade, le formulaire n'est pas valide car :
    // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
    // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau
  
    return $this->render('OCPlatformBundle:Advert:add.html.twig', array(
      'form' => $form->createView(),
    ));
    
  }

  public function editAction($id, Request $request)
  {
    // On récupère l'EntityManager
    $em = $this->getDoctrine()->getManager();

    
    // On récupère l'entité correspondant à l'id $id
    $advert = $em->getRepository('OCPlatformBundle:Advert')->find($id);

    // Si l'annonce n'existe pas, on affiche une erreur 404
    if ($advert == null) {
      throw $this->createNotFoundException("L'annonce d'id ".$id." n'existe pas.");
    }
   
    $form = $this->createForm(new AdvertEditType(), $advert);
    
    // On vérifie que les valeurs entrées sont correctes
    // (Nous verrons la validation des objets en détail dans le prochain chapitre)
    if ($form->handleRequest($request)->isValid()) {       
            
      $em->flush();

      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

      // On redirige vers la page de visualisation de l'annonce nouvellement créée
      return $this->redirect($this->generateUrl('oc_platform_view', array('id' => $advert->getId())));
    }

    // À ce stade, le formulaire n'est pas valide car :
    // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
    // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau
    return $this->render('OCPlatformBundle:Advert:edit.html.twig', array(
      'form' => $form->createView(),
      'advert' => $advert
    ));

  }

  public function deleteAction($id, Request $request)
  {
    // On récupère l'EntityManager
    $em = $this->getDoctrine()->getManager();

    // On récupère l'entité correspondant à l'id $id
    $advert = $em->getRepository('OCPlatformBundle:Advert')->find($id);

    // Si l'annonce n'existe pas, on affiche une erreur 404
    if ($advert == null) {
      throw $this->createNotFoundException("L'annonce d'id ".$id." n'existe pas.");
    }

    $form = $this->createFormBuilder()->getForm();
    
    if ($request->isMethod('POST')) {
      // Si la requête est en POST, on deletea l'article
      $em->remove($advert);
      $em->flush(); 
      
      $request->getSession()->getFlashBag()->add('info', 'Annonce bien supprimée.');

      // Puis on redirige vers l'accueil
      return $this->redirect($this->generateUrl('oc_platform_home'));
    }

    // Si la requête est en GET, on affiche une page de confirmation avant de delete
    return $this->render('OCPlatformBundle:Advert:delete.html.twig', array(
      'advert' => $advert,
      'form'   => $form->createView()       
    ));
  }

  public function menuAction($limit = 3)
  {
    $listAdverts = $this->getDoctrine()
      ->getManager()
      ->getRepository('OCPlatformBundle:Advert')
      ->findBy(
        array(),                 // Pas de critère
        array('date' => 'desc'), // On trie par date décroissante
        $limit,                  // On sélectionne $limit annonces
        0                        // À partir du premier
    );

    return $this->render('OCPlatformBundle:Advert:menu.html.twig', array(
      'listAdverts' => $listAdverts
    ));
  }
  
  public function testAction()
  {
    $advert = new Advert;
        
    $advert->setDate(new \Datetime());  // Champ « date » OK
    $advert->setTitle('abc');           // Champ « title » incorrect : moins de 10 caractères
    //$advert->setContent('blabla');    // Champ « content » incorrect : on ne le définit pas
    $advert->setAuthor('A');            // Champ « author » incorrect : moins de 2 caractères
        
    // On récupère le service validator
    $validator = $this->get('validator');
        
    // On déclenche la validation sur notre object
    $listErrors = $validator->validate($advert);

    // Si le tableau n'est pas vide, on affiche les erreurs
    if(count($listErrors) > 0) {
      return new Response(print_r($listErrors, true));
    } else {
      return new Response("L'annonce est valide !");
    }
  }
  
  public function translationAction($name)
  {
    return $this->render('OCPlatformBundle:Advert:translation.html.twig', array(
      'name' => $name
    ));
  }
  
  /**
   * @ParamConverter("json")
   */
  public function ParamConverterAction($json)
  {
    return new Response(print_r($json, true));
  }
  
}