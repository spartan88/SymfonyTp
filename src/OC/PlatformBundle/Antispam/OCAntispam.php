<?php
// src/OC/PlatformBundle/Antispam/OCAntispam.php

namespace OC\PlatformBundle\Antispam;

use Swift_Mailer;
use Twig_Extension;
use Twig_Function_Method;

class OCAntispam extends Twig_Extension
{
	
  private $mailer;
  private $locale;
  private $minLength;

  public function __construct(Swift_Mailer $mailer, $minLength)
  {
    $this->mailer    = $mailer;
    $this->minLength = (int) $minLength;
  }
  
  /**
   * Vérifie si le texte est un spam ou non
   *
   * @param string $text
   * @return bool
   */
  public function isSpam($text)
  {
    return strlen($text) < $this->minLength;
  }
  
    // Twig va exécuter cette méthode pour savoir quelle(s) fonction(s) ajoute notre service
  public function getFunctions()
  {
    return array(
      'checkIfSpam' => new Twig_Function_Method($this, 'isSpam')
    );
  }

  // La méthode getName() identifie votre extension Twig, elle est obligatoire
  public function getName()
  {
    return 'OCAntispam';
  }
  
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
}