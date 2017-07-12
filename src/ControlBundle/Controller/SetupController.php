<?php

namespace ControlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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
		$setup = new MbSetup();
		
	    $form = $this->get('form.factory')->create(MbSetupType::class, $setup);
	    $form->handleRequest($request);
	           
        if($form->isValid())
        {
    	    
        }
	    
	    // replace this example code with whatever you need
        return $this->render('control/setup.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
