<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use AppBundle\Entity\MbUser;

class LoadAdminUser implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$adminUser = new MbUser();
		$adminUser->setUsername("admin");
		$adminUser->setUsernameCanonical("admin");
		$adminUser->setEmail("wubii.wu@gmail.com");
		$adminUser->setEmailCanonical("admin");
		$adminUser->setEnabled(1);
		$adminUser->setPlainPassword("adminpassword");
		$adminUser->setRoles(array("ROLE_ADMIN"));
		
		$manager->persist($adminUser);
		$manager->flush();
	}
}