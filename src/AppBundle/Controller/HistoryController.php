<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HistoryController extends Controller
{
    /**
    * @Route("/history", name="history")
    */
    public function historyAction(Request $request)
    {
	    return $this->render('default/history.html.twig', array());
    }
}
