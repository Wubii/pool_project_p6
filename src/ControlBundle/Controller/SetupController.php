<?php

namespace ControlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Form;

use ControlBundle\Entity\MbSetup;

use ControlBundle\Form\MbSetupType;

class SetupController extends Controller
{
	/**
     * @Route("/control/setup", name="CONTROL_setup")
     */
    public function setupAction(Request $request)
    {
		$setup = $this->getDoctrine()->getManager()->getRepository('ControlBundle:MbSetup')->findOneBy(array('name' => 'Setup'));
		
		if(is_null($setup))
		{
			return new Response('Error: setup missing');
		}
		
	    $form = $this->get('form.factory')->create(MbSetupType::class, $setup);
	    $form->handleRequest($request);
	           
        if($form->isValid())
        {
	        $em = $this->getDoctrine()->getManager();
            $em->persist($setup);
            $em->flush();
            
            return $this->redirectToRoute('CONTROL_setup');
        }
	    
	    // replace this example code with whatever you need
        return $this->render('control/setup.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
