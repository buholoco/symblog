<?php
// src/Blogger/BlogBundle/Controller/BlogController.php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Blog Controller
 */
class BlogController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);
        
        if (!$blog) {
            throw $this->createNotFoundException('Unable to find blog post.');
        }
        
        return $this->render('BloggerBlogBundle:Blog:show.html.twig', array(
                'blog' => $blog,
        ));
    }
}