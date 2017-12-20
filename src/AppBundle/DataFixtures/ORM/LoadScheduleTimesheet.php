<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use ControlBundle\Entity\MbProgram;
use ControlBundle\Entity\MbScheduleTimesheet;

class LoadScheduleTimesheet implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$program = new MbProgram("program1");
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 00:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 00:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 01:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 01:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 02:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 02:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 03:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 03:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 04:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 04:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 05:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 05:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 06:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 06:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 07:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 07:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 08:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 08:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 09:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 09:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 10:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 10:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 11:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 11:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 12:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 12:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 13:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 13:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 14:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 14:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 15:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 15:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 16:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 16:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 17:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 17:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 18:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 18:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 19:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 19:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 20:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 20:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 21:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 22:30:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 23:00:00'));
		$program->getEntries()->add($timesheet);
		
		$timesheet = new MbScheduleTimesheet(new \Datetime('01/01/2017 23:30:00'));
		$program->getEntries()->add($timesheet);

		$manager->persist($program);
		
		$manager->flush();
	}
}