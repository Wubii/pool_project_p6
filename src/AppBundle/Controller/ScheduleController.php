<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ScheduleController extends Controller
{
    /**
    * @Route("/schedule", name="schedule")
    */
    public function scheduleAction(Request $request)
    {
	    return $this->render('default/schedule.html.twig', array());
    }
}
