<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use OC\PlatformBundle\Validator\Antiflood;


/**
 * Advert
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="OC\PlatformBundle\Entity\AdvertRepository")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields="title", message="Une annonce existe déjà avec ce titre.")
 */
class Advert
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     * @Assert\DateTime()
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     * @Assert\Length(min=10, minMessage="titre.length.min")
     */
    private $title;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="OC\UserBundle\Entity\User",inversedBy="adverts")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     * @Antiflood()
     * @Assert\NotBlank(message="Le contenu ne doit pas être vide.")
     */
    private $content;

    
    /**
     * @ORM\Column(name="published", type="boolean")
     */
    private $published = true;

    /**
     * @ORM\OneToOne(targetEntity="OC\PlatformBundle\Entity\Image", cascade={"persist" , "remove"})
     * @Assert\Valid()
     */
     private $image;
     
     /**
      * @ORM\ManyToMany(targetEntity="OC\PlatformBundle\Entity\Category", cascade={"persist"})
      */
    private $categories;

     /**
      * @ORM\OneToMany(targetEntity="OC\PlatformBundle\Entity\Application", mappedBy="advert")
      */
    private $applications;
    
    /**
      * @ORM\OneToMany(targetEntity="OC\PlatformBundle\Entity\AdvertSkill", mappedBy="advert")
      */
    private $skills;
    
    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(name="nb_applications", type="integer")
     */
    private $nbApplications = 0;
    
    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;
  
  
    public function __construct()
    {
      // Par défaut, la date de l'annonce est la date d'aujourd'hui
      $this->date = new \Datetime();
      $this->categories = new ArrayCollection();
      $this->applications = new ArrayCollection();
    }
   
    public function getAdvert(){
        return $this;
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Advert
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set date
     *
     * @param \DateTime $updatedAt
     * @return Advert
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->UpdatedAt;
    }
    
    /**
     * Set title
     *
     * @param string $title
     * @return Advert
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param User $author
     * @return Advert
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get author
     *
     * @return User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Advert
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }
    

    /**
     * Set published
     *
     * @param boolean $published
     * @return Advert
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return boolean 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set image
     *
     * @param \OC\PlatformBundle\Entity\Image $image
     * @return Advert
     */
    public function setImage(Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \OC\PlatformBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add categories
     *
     * @param \OC\PlatformBundle\Entity\Category $categories
     * @return Advert
     */
    public function addCategory(Category $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \OC\PlatformBundle\Entity\Category $categories
     */
    public function removeCategory(Category $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
    
  public function addApplication(Application $application)
  {
    $this->applications[] = $application;

    // On lie l'annonce à la candidature
    $application->setAdvert($this);

    return $this;

  }

  public function removeApplication(Application $application)
  {
    $this->applications->removeElement($application);
  }

  public function getApplications()
  {
    return $this->applications;
  }
  
      /**
     * Add skill
     *
     * @param \OC\PlatformBundle\Entity\Category $skill
     * @return Advert
     */
    public function addSkill(Skill $skill)
    {
        $this->skills[] = $skill;

        return $this;
    }

    /**
     * Remove skill
     *
     * @param \OC\PlatformBundle\Entity\Category $skill
     */
    public function removeSkill(Category $skill)
    {
        $this->skills->removeElement($skill);
    }

    /**
     * Get skills
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSkills()
    {
        return $this->skills;
    }
    
    
 /**
  * @ORM\PreUpdate
  */
  public function updateDate()
  {
    $this->setUpdatedAt(new \Datetime());
  }
  
  public function increaseApplication()
  {
    $this->nbApplications++;
  }

  public function decreaseApplication()
  {
    $this->nbApplications--;
  }

    /**
     * Set nbApplications
     *
     * @param integer $nbApplications
     * @return Advert
     */
    public function setNbApplications($nbApplications)
    {
        $this->nbApplications = $nbApplications;

        return $this;
    }

    /**
     * Get nbApplications
     *
     * @return integer 
     */
    public function getNbApplications()
    {
        return $this->nbApplications;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Advert
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
    
    
  /**
   * @Assert\Callback
   */
  public function isContentValid(ExecutionContextInterface $context)
  {
    $forbiddenWords = array('échec', 'abandon');

    // On vérifie que le contenu ne contient pas l'un des mots
    if (preg_match('#'.implode('|', $forbiddenWords).'#', $this->getContent())) {
      // La règle est violée, on définit l'erreur
      $context
        ->buildViolation('Contenu invalide car il contient un mot interdit.') // message
        ->atPath('content')                                                   // attribut de l'objet qui est violé
        ->addViolation() // ceci déclenche l'erreur, ne l'oubliez pas
      ;
    }
  }
  
}
