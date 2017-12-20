<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Appbundle\Entity\MbUser;

class UserController extends Controller
{
    /**
     * @Route("/user/list", name="ADMIN_user")
     * 
     */
    public function UserListAction(Request $request)
    {
    	$users = $this->getDoctrine()->getManager()->getRepository('AppBundle:MbUser')->findAll();
    	
        return $this->render('admin/user-list.html.twig', [
        	'users' => $users
        ]);
    }
}
