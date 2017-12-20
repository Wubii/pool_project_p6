<?php

namespace ControlBundle\Services;

use Doctrine\ORM\EntityManager;

use RaspberryPiIOBundle\Services\RelayService;

class PumpControlService
{ 
	private $em = null;
	private $rs = null;
    
    public function __construct(EntityManager $em, RelayService $rs) 
    { 
    	//Son constructeur avec l'entity manager en paramètre
        $this->em = $em;
        $this->rs = $rs;
    }
    
	public function getPumpState()
	{
	    $setup = $this->em->getRepository('ControlBundle:MbSetup')->findOneBy(array("name" => "Setup"));
	    $pumpState = $setup->getPump()->getState();
	    return $pumpState;
	}
	
	public function setPumpState($state)
	{
		$setup = $this->em->getRepository('ControlBundle:MbSetup')->findOneBy(array("name" => "Setup"));
	
		$pumpState = $setup->getPump()->setState($state);
		
        $this->em->persist($pumpState);
        $this->em->flush();
                
        $relayPumpName = $setup->getPump()->getRelayName();
		
		$setPump = $this->rs->setValue($relayPumpName, $state);
	
	}
}
