<?php

namespace ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MbSetup
 *
 * @ORM\Table(name="mb_setup")
 * @ORM\Entity(repositoryClass="ControlBundle\Repository\MbSetupRepository")
 */
class MbSetup
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;
    
    /**
     * @var bool
     *
     * @ORM\Column(name="mode", type="boolean", nullable=false)
     */
    private $mode;

    /**
     * @var int
     *
     * @ORM\Column(name="tempSetPoint", type="integer", nullable=true)
     */
    private $tempSetPoint;

    /**
     * @var \stdClass
     *
     * @ORM\OneToOne(targetEntity="MbValve",  cascade={"persist"})
     * @ORM\JoinColumn(name="valve_id", referencedColumnName="id", nullable=true, unique=true)
     */
    private $valve;

    /**
     * @var \stdClass
     * 
     * @ORM\OneToOne(targetEntity="MbPump", cascade={"persist"})
     * @ORM\JoinColumn(name="pump_id", referencedColumnName="id", nullable=true, unique=true)
     */
    private $pump;

    /**
     * @var \stdClass
     *
     * @ORM\OneToOne(targetEntity="MbTemperatureSensor", cascade={"persist"})
     * @ORM\JoinColumn(name="airTemp_id", referencedColumnName="id", nullable=true, unique=true)
     */
    private $airTemp;

    /**
     * @var \stdClass
     *
     * @ORM\OneToOne(targetEntity="MbTemperatureSensor", cascade={"persist"})
     * @ORM\JoinColumn(name="poolTemps_id", referencedColumnName="id", nullable=true, unique=true)
     */
    private $poolTemp;

    /**
     * @var \stdClass
     *
     * @ORM\OneToOne(targetEntity="MbTemperatureSensor", cascade={"persist"})
     * @ORM\JoinColumn(name="panelTemp_id", referencedColumnName="id", nullable=true, unique=true)
     */
    private $panelTemp;

    /**
     * @var \stdClass
     *
     * @ORM\OneToOne(targetEntity="MbLightSensor", cascade={"persist"})
     * @ORM\JoinColumn(name="light_id", referencedColumnName="id", nullable=true, unique=true)
     */
    private $luminosity;
    
    /**
     * @var int
     * 
     * @ORM\Column(name="luminosityThreshold", type="integer", nullable=true)
     */
    private $luminosityThreshold;
    
    public function __construct()
    {
    	$this->luminosityThreshold = false;
    }
    

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return MbSetup
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set mode
     *
     * @param string $mode
     *
     * @return MbSetup
     */
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * Get mode
     *
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Set tempSetPoint
     *
     * @param integer $tempSetPoint
     *
     * @return MbSetup
     */
    public function setTempSetPoint($tempSetPoint)
    {
        $this->tempSetPoint = $tempSetPoint;

        return $this;
    }

    /**
     * Get tempSetPoint
     *
     * @return int
     */
    public function getTempSetPoint()
    {
        return $this->tempSetPoint;
    }

    /**
     * Set valve
     *
     * @param \stdClass $valve
     *
     * @return MbSetup
     */
    public function setValve($valve)
    {
        $this->valve = $valve;

        return $this;
    }

    /**
     * Get valve
     *
     * @return \stdClass
     */
    public function getValve()
    {
        return $this->valve;
    }

    /**
     * Set pump
     *
     * @param \stdClass $pump
     *
     * @return MbSetup
     */
    public function setPump($pump)
    {
        $this->pump = $pump;

        return $this;
    }

    /**
     * Get pump
     *
     * @return \stdClass
     */
    public function getPump()
    {
        return $this->pump;
    }

    /**
     * Set airTemp
     *
     * @param \stdClass $airTemp
     *
     * @return MbSetup
     */
    public function setAirTemp($airTemp)
    {
        $this->airTemp = $airTemp;

        return $this;
    }

    /**
     * Get airTemp
     *
     * @return \stdClass
     */
    public function getAirTemp()
    {
        return $this->airTemp;
    }

    /**
     * Set poolTemp
     *
     * @param \stdClass $poolTemp
     *
     * @return MbSetup
     */
    public function setPoolTemp($poolTemp)
    {
        $this->poolTemp = $poolTemp;

        return $this;
    }

    /**
     * Get poolTemp
     *
     * @return \stdClass
     */
    public function getPoolTemp()
    {
        return $this->poolTemp;
    }

    /**
     * Set panelTemp
     *
     * @param \stdClass $panelTemp
     *
     * @return MbSetup
     */
    public function setPanelTemp($panelTemp)
    {
        $this->panelTemp = $panelTemp;

        return $this;
    }

    /**
     * Get panelTemp
     *
     * @return \stdClass
     */
    public function getPanelTemp()
    {
        return $this->panelTemp;
    }

    /**
     * Set luminosity
     *
     * @param \stdClass $luminosity
     *
     * @return MbSetup
     */
    public function setLuminosity($luminosity)
    {
        $this->luminosity = $luminosity;

        return $this;
    }

    /**
     * Get luminosity
     *
     * @return \stdClass
     */
    public function getLuminosity()
    {
        return $this->luminosity;
    }

    /**
     * Set luminosityThreshold
     *
     * @param integer $luminosityThreshold
     *
     * @return MbluminositySensor
     */
    public function setLuminosityThreshold($luminosityThreshold)
    {
        $this->luminosityThreshold = $luminosityThreshold;

        return $this;
    }

    /**
     * Get luminosityThreshold
     *
     * @return int
     */
    public function getLuminosityThreshold()
    {
        return $this->luminosityThreshold;
    }
}

