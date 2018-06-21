<?php

namespace App\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use App\Entity\BlogPost;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
* @Route("/api")
*/
class ApiBlogPostsController extends Controller
{
    /**
     * @Route("/blogs", name="api_blog_posts")
     * @Method("GET")
     */
    public function getBlogPosts(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $blogs = $em->getRepository(BlogPost::class)->findByArrayResult();
        return new JsonResponse($blogs,200);
    }

    /**
     * @Route("/blogs/{id}", name="api_blog_posts_by_id")
     * @Method("GET")
     */
    public function getBlogPostsById(Request $request) {

        if($request->get('id') <= 0){
            return new JsonResponse('Incorrect param sent',400);
        }

        $em = $this->getDoctrine()->getManager();
        $blog = $em->getRepository(BlogPost::class)->findByArrayResult($request->get('id'));
        
        if(empty($blog)){
            return new JsonResponse('Blog not found',404);
        }

        return new JsonResponse($blog,200);
    }
}