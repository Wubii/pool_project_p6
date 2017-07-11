<?php

namespace ControlBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use ControlBundle\Entity\MbPump;

class LoadPump implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$pumpArray = [
			["PumpPool", false],
			["PumpPanel", false],
		];
		
		foreach ($pumpArray as $pump)
		{
			$entry = new MbPump();
			$entry->setName($pump[0]);
			$entry->setState($pump[1]);
			
			$manager->persist($entry);
		}
		
		$manager->flush();
	}
}