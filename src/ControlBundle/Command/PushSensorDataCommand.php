<?php

namespace ControlBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use ControlBundle\Entity\MbSensorData;

class PushSensorDataCommand extends ContainerAwareCommand 
{
    protected function configure() 
    {
        // On set le nom de la commande
        $this->setName('control:sensor:push');

        // On set la description
        $this->setDescription("Push sensor data into database");

        // On set l'aide
        $this->setHelp("Push sensor data into database");
    }

    public function execute(InputInterface $input, OutputInterface $output) 
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        
        $ss = $this->getContainer()->get('control_sensor_service');
        $vs = $this->getContainer()->get('control_valve_state_service');
        $ps = $this->getContainer()->get('control_pump_state_service');
        
        echo("Get data...");
        
        $airTemp    = $ss->getAirTemp();
        $poolTemp   = $ss->getPoolTemp();
        $panelTemp  = $ss->getPanelTemp();
        $luminosity = $ss->getLuminosity();
        $valveState = $vs->getValveState();
        $pumpState  = $ps->getPumpState();
        
        echo("Persist in the database.." . "\n");
        
        
        $sensorData = new MbSensorData($airTemp, $poolTemp, $panelTemp, $luminosity, $valveState, $pumpState);
        
        $em->persist($sensorData);
        $em->flush();
        
        echo("Command success !" . "\n");
    }
}