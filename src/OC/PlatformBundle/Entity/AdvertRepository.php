<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * AdvertRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AdvertRepository extends EntityRepository
{
  public function myFindAll()
  {
	  $qb = $this->createQueryBuilder('a');
	
	  // On peut ajouter ce qu'on veut avant
	  $qb
	    ->where('a.author = :author')
	    ->setParameter('author', 'Marine')
	  ;
	
	  // On applique notre condition sur le QueryBuilder
	  $this->whereCurrentYear($qb);
	
	  // On peut ajouter ce qu'on veut après
	  $qb->orderBy('a.date', 'DESC');
	
	  return $qb
	    ->getQuery()
	    ->getResult()
	  ;
  }
  
 public function myFindOne($id)
 {
	  $qb = $this->createQueryBuilder('a');
	
	  $qb
	    ->where('a.id = :id')
	    ->setParameter('id', $id)
	  ;
	
	  return $qb
	    ->getQuery()
	    ->getResult()
	  ;
 }
 
  public function findByAuthorAndDate($author, $year)
  {
	  $qb = $this->createQueryBuilder('a');
	
	  $qb->where('a.author = :author')
	       ->setParameter('author', $author)
	     ->andWhere('a.date < :year')
	       ->setParameter('year', $year)
	     ->orderBy('a.date', 'DESC')
	  ;
	
	  return $qb
	    ->getQuery()
	    ->getResult()
	  ;
  }
 
  public function whereCurrentYear(QueryBuilder $qb)
  {
    $qb
      ->andWhere('a.date BETWEEN :start AND :end')
      ->setParameter('start', new \Datetime(date('Y').'-01-01'))  // Date entre le 1er janvier de cette année
      ->setParameter('end',   new \Datetime(date('Y').'-12-31'))  // Et le 31 décembre de cette année
    ;
    
    return $qb;
  }
  
  public function myFindAllDQL()
  {
	  $query = $this->_em->createQuery('SELECT a FROM OCPlatformBundle:Advert a');
	  $results = $query->getResult();
	
	  return $results;
  }
  
  public function myFindDQL($id)
  {
	  $query = $this->_em->createQuery('SELECT a FROM Advert a WHERE a.id = :id');
	  $query->setParameter('id', $id);
	  
	  // Utilisation de getSingleResult car la requête ne doit retourner qu'un seul résultat
	  return $query->getSingleResult();
  }
  
  
  public function getAdvertWithCategories(array $categoryNames){
  	
    $qb = $this->createQueryBuilder('a');
	
    // On fait une jointure avec l'entité Category avec pour alias « c »
    $qb
      ->join('a.categories', 'c')
      ->addSelect('c')
    ;
	
    // Puis on filtre sur le nom des catégories à l'aide d'un IN
    $qb->where($qb->expr()->in('c.name', $categoryNames));
    // La syntaxe du IN et d'autres expressions se trouve dans la documentation Doctrine
    
	return $qb
	  ->getQuery()
	  ->getResult()
	;
	  
  }
  
  public function getAdverts($page, $nbPerPage)
  {
    $query = $this->createQueryBuilder('a')      
      ->leftjoin("a.image", "i")
      ->addSelect("i")      
      ->leftjoin('a.categories', 'c')
      ->addSelect("c") 
      ->leftjoin('a.skills', 's')
      ->addSelect("s")
      ->orderBy('a.date', 'DESC')
      ->getQuery()
    ;

    $query
      // On définit l'annonce à partir de laquelle commencer la liste
      ->setFirstResult(($page-1) * $nbPerPage)
      // Ainsi que le nombre d'annonce à afficher sur une page
      ->setMaxResults($nbPerPage)
    ;

    // Enfin, on retourne l'objet Paginator correspondant à la requête construite
    // (n'oubliez pas le use correspondant en début de fichier)
    return new Paginator($query, true);
  }
  
  public function getPublishedQueryBuilder()
  {
    return $this
      ->createQueryBuilder('a')
      ->where('a.published = :published')
      ->setParameter('published', true)
    ;
  }
  
}
