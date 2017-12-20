<?php

namespace ControlBundle\Services;

use Doctrine\ORM\EntityManager;

use RaspberryPiIOBundle\Services\RelayService;

class ValveControlService
{ 
	private $em = null;
	private $rs = null;
    
    public function __construct(EntityManager $em, RelayService $rs) 
    { 
    	//Son constructeur avec l'entity manager en paramètre
        $this->em = $em;
        $this->rs = $rs;
    }
    
	public function getValveState()
	{
	    $setup = $this->em->getRepository('ControlBundle:MbSetup')->findOneBy(array("name" => "Setup"));
	    $valveState = $setup->getValve()->getState();

	    if($valveState == 1)
	    {
	    	$valveState = true;
	    }
	    else if($valveState == 0)
	    {
	    	$valveState = false;
	    }
	    else
	    {
	    	$valveState = false;
	    }

		return $valveState;
	}
	
	private function resetRelay($state)
	{
	    $relayOpenNameValue = $this->rs->setValue($relayOpenName, false);
		$relayCloseNameValue = $this->rs->setValue($relayCloseName, false);
		
		$setup = $this->em->getRepository('ControlBundle:MbSetup')->findOneBy(array("name" => "Setup"));

        $valveState = $setup->getValve()->setState($state);
		
        $this->em->persist($valveState);
        $this->em->flush();
	}
	
	public function setValveState($state)
	{
		$setup = $this->em->getRepository('ControlBundle:MbSetup')->findOneBy(array("name" => "Setup"));
	
		$valveState = $setup->getValve()->setState($state);
		
        $this->em->persist($valveState);
        $this->em->flush();
        
        $relayOpenName = $setup->getValve()->getRelayOpenName();
        $relayCloseName = $setup->getValve()->getRelayCloseName();
		
		if($state == 1)
		{
			$relayOpenNameValue = $this->rs->setValue($relayOpenName, true);
			$relayCloseNameValue = $this->rs->setValue($relayCloseName, false);
			//event_timer_set($event, self::resetRelay, $state);
		}
		elseif($state == 0)
		{
			$relayOpenNameValue = $this->rs->setValue($relayOpenName, false);
			$relayCloseNameValue = $this->rs->setValue($relayCloseName, true);
			//event_timer_set($event, self::resetRelay, $state);
		}
	}
}
