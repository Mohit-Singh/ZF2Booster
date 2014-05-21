<?php
namespace ZF2Booster\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ZF2BoosterController extends AbstractActionController
{
    public function indexAction()
    {
        // store item in filesystem cache
        $this->getServiceLocator()->get('Zend\Cache\Storage\Filesystem')->setItem('foo','taxi');
        
        // store item in memcached cache
        //$this->getServiceLocator()->get('Zend\Cache\Storage\Memcached')->setItem('foo', 'taxi');
        
        exit('Items Set here');
    }
    
    public function getItemsAction()
    {
        // get item in filesystem cache
        echo 'Cached Item is:- '.$this->getServiceLocator()->get('Zend\Cache\Storage\Filesystem')->getItem('foo');
        
        // get item in memcached cache
        //echo 'Cached Item is:- '.$this->getServiceLocator()->get('Zend\Cache\Storage\Memcached')->getItem('foo');
        exit;
    }
}