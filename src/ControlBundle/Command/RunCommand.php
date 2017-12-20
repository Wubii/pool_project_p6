<?php

namespace ControlBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use ControlBundle\Entity\MbSensorData;

class RunCommand extends ContainerAwareCommand 
{
    protected function configure() 
    {
        // On set le nom de la commande
        $this->setName('control:run');

        // On set la description
        $this->setDescription("Run the algorithm");

        // On set l'aide
        $this->setHelp("Run the algorithm");
    }

    public function execute(InputInterface $input, OutputInterface $output) 
    {
        echo("Calcul..." . "\n");

        $em = $this->getContainer()->get('doctrine')->getManager();
        $ss = $this->getContainer()->get('control_sensor_service');
        $ps = $this->getContainer()->get('control_pump_state_service');
        $vs = $this->getContainer()->get('control_valve_state_service');
        $lts = $this->getContainer()->get('control_light_threshold_service');
        
        $setup = $em->getRepository('ControlBundle:MbSetup')->findOneBy(array("name" => "setup"));
        $schedule = $em->getRepository('ControlBundle:MbProgram')->findOneBy(array("name" => "program1"));
        
        echo("Load timesheet scheduler : ");
        
        // 1 = mode auto
        if($setup->getMode() == 1)
        {
        	// PUMP CONTROL
        	$date = new \Datetime("now"); 
        	$time = $date->format("His");
        	
        	foreach($schedule->getEntries() as $timesheet)
        	{
        		$startDate = $timesheet->getHour();
        		$endDate = clone $startDate;
        		
        		// Vérifier les ko limit
        		$endDate->add(new \DateInterval("PT29M"));
        		
        		$startTime = $startDate->format("His");
        		$endTime = $endDate->format("His");
        		
        		if(($time >= $startTime) && ($time <= $endTime))
        		{
	        		echo("Start date : " . $startTime . "\n");
	        		echo("End date : " . $endTime . "\n");
	        		echo("Now : " . $time . "\n"); 
        		
        			if($timesheet->getStatus() == true)
        			{
        				echo("Pump on" . "\n");
        				$ps->SetPumpState(true);
        			}
        			else
        			{
        				echo("Pump is switched off" . "\n");
        				$ps->SetPumpState(false);	
        			}
        			
        			echo("\n");
        		}
           	}
           	
           	// VALVE CONTROL
           	$defaultTemp = $setup->getTempSetPoint();
           	$waterTemp = $ss->getPoolTemp();
           	$airTemp = $ss->getAirTemp();
           	$isSunny = $lts->isSunny();
           	
        	echo("Get weather : " . "\n");
           	
           	if(($waterTemp < $defaultTemp) || ($isSunny == true))
           	{
           		if(($airTemp > $defaultTemp))
           		{
        			echo("Panel Solar on" . "\n");
        			$vs->SetValveState(1);
           		}
           		else
           		{
           			echo("Panel solar switched off");
        			$vs->SetValveState(0);
           		}
           		
           	}
           	else
           	{
       			echo("Panel solar switched off");
    			$vs->SetValveState(0);
           	}
           	
           	echo("\n");
        }
    }
}