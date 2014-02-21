<?php

/**
 * @author Sergey Borsuk
 */

namespace Test\RestBundle\Services;



class Recursion {

    private $nodes;
    private $parentId;

    public function __construct($nodes, $parentId) {
         $this->nodes = $nodes;
         $this->parentId = $parentId;
    }


     public function buildTree($nodes, $parentId = 0) {
            $branch = array();
            foreach ($nodes as $node) {
                $node['leaf'] = true;
                if ($node['parentId'] == $parentId) {
                    $children = $this->buildTree($nodes, $node['id']);
                    if ($children) {
                        $node['children'] = $children;
                        $node['leaf'] = false;
                    }
                    $branch[] = $node;
                }
            }

        return $branch;
     }

}









//
//
//public function buildTree() {
//
//    function buildTree($nodes, $parentId = 0) {
//        $branch = array();
//        foreach ($nodes as $node) {
//            $node['leaf'] = true;
//            if ($node['parentId'] == $parentId) {
//                $children = buildTree($nodes, $node['id']);
//                if ($children) {
//                    $node['children'] = $children;
//                    $node['leaf'] = false;
//                }
//                $branch[] = $node;
//            }
//        }
//        return $branch;
//    }
//}