<?php
/**
 * @author Sergey Borsuk
 */

namespace Test\RestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Test\RestBundle\Services;

class RestController extends Controller {


    public function indexAction() {

       return $this->render('TestRestBundle:Main:index.html.twig');
    }


    public function getNodesTreeAction() {

        $repository = $this->getDoctrine()->getRepository('TestRestBundle:Nodes');
        $nodes = $repository->createQueryBuilder('e')
                            ->select('e')->getQuery()->getArrayResult();

        $tree = $this->get('recursion')->buildTree($nodes);

        return new JsonResponse($tree);
    }


   

   /// generates random data into table

//    public function generateNodesAction() {
//
//        $em = $this->getDoctrine()->getManager();
//
//        for( $i=0; $i<30; $i++) {
//           $node = new Nodes();
//           $node->setParentId(mt_rand(0,5));
//           $node->setText('node - ' . $i);
//           $em->persist($node);
//           $em->flush();
//        }
//
//        return new Response();
//    }

}
