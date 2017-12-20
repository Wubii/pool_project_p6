<?php

namespace ControlBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use ControlBundle\Entity\MbProgram;

use ControlBundle\Form\MbProgramType;

class ScheduleController extends Controller
{
    /**
    * @Route("/schedule", name="schedule")
    */
    public function scheduleAction(Request $request)
    {
    	$program = $this->getDoctrine()->getManager()->getRepository('ControlBundle:MbProgram')->findOneBy(array("name" => "program1"));
    	
    	$form = $this->get('form.factory')->create(MbProgramType::class, $program);
	    $form->handleRequest($request);
	           
        if($form->isValid())
        {
	        $em = $this->getDoctrine()->getManager();
            $em->persist($program);
            $em->flush();
            
            return $this->redirectToRoute('schedule');
        }
    	
	    return $this->render('default/schedule.html.twig', array(
            'form' => $form->createView(),
	    	'timesheets' => $program->getEntries(),
	    ));
    }
}
