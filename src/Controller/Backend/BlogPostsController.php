<?php

namespace App\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use App\Entity\BlogPost;
use Symfony\Component\HttpFoundation\JsonResponse;


class BlogPostsController extends Controller
{

    /**
     * @Route("/", name="blog_posts_index")
     * @Method("GET")
     */
    public function index(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository(BlogPost::class)->findAll();

        return $this->render('blog_posts/index.html.twig', [
            'data' => $data,
        ]);
    }

    /**
    * @Route("/blog_post/{id}", name="blog_posts_show")
    * @Method("GET")
    */
    public function show(BlogPost $blog_post)
    {
        return $this->render('blog_posts/show.html.twig', [
            'blog_post' => $blog_post,
        ]);
    }

}


