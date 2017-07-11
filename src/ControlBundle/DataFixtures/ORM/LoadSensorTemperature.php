<?php

namespace ControlBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use ControlBundle\Entity\MbTemperatureSensor;

class LoadSensorTemperature implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$nameArray = [
			"Water temperature",
			"Air temperature",
			"Water solar temperature"
		];
		
		foreach ($nameArray as $name)
		{
			$entry = new MbTemperatureSensor();
			$entry->setName($name);
			
			$manager->persist($entry);
		}
		
		$manager->flush();
	}
}