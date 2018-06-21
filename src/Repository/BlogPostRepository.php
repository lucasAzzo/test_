<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class BlogPostRepository extends EntityRepository {
    
    public function findByArrayResult($id = null) {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('blogPost.id, blogPost.title');
        $qb->from('App:BlogPost', 'blogPost');

        if(!empty($id)){
            $qb->where($qb->expr()->eq('blogPost.id', $id));
        }

        return $qb->getQuery()->getArrayResult();
    }
    
}