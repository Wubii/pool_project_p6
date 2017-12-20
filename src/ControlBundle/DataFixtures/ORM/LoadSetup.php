<?php

namespace ControlBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use ControlBundle\Entity\MbSetup;
use ControlBundle\Entity\MbValve;
use ControlBundle\Entity\MbPump;
use ControlBundle\Entity\MbLightSensor;
use ControlBundle\Entity\MbTemperatureSensor;

class LoadSetup implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$valve = new MbValve();
		$valve->setName("valve");
		$valve->setState(false);
		$valve->setRelayOpenName(null);
		$valve->setRelayCloseName(null);
		$valve->setTimeToOpen(10);
		$valve->setTimeToClose(10);
		
		$pump = new MbPump();
		$pump->setName("pump");
		$pump->setState(false);
		$pump->setRelayName(null);
		
		$light = new MbLightSensor();
		$light->setName("luminosity");
		$light->setSerialNumber(null);
		
		$airTemp = new MbTemperatureSensor();
		$airTemp->setName("Air Temperature");
		$airTemp->setSerialNumber(null);
		
		$poolTemp = new MbTemperatureSensor();
		$poolTemp->setName("Pool Temperature");
		$poolTemp->setSerialNumber(null);
		
		$panelTemp = new MbTemperatureSensor();
		$panelTemp->setName("Panel Temperature");
		$panelTemp->setSerialNumber(null);
		
		$setup = new MbSetup();
		$setup->setName("Setup");
		$setup->setMode(false);
		$setup->setValve($valve);
		$setup->setPump($pump);
		$setup->setLuminosity($light);
		$setup->setLuminosityThreshold(50);
		$setup->setAirTemp($airTemp);
		$setup->setPoolTemp($poolTemp);
		$setup->setPanelTemp($panelTemp);
		
		$manager->persist($setup);
		$manager->flush();
	}
}