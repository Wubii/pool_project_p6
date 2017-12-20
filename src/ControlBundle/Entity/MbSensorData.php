<?php

namespace ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MbSensorData
 *
 * @ORM\Table(name="mb_sensor_data")
 * @ORM\Entity(repositoryClass="ControlBundle\Repository\MbSensorDataRepository")
 */
class MbSensorData
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="airTemp", type="float")
     */
    private $airTemp;

    /**
     * @var float
     *
     * @ORM\Column(name="poolTemp", type="float")
     */
    private $poolTemp;

    /**
     * @var float
     *
     * @ORM\Column(name="panelTemp", type="float")
     */
    private $panelTemp;

    /**
     * @var float
     *
     * @ORM\Column(name="luminosity", type="float")
     */
    private $luminosity;

    /**
     * @var bool
     *
     * @ORM\Column(name="valveState", type="boolean", nullable=true)
     */
    private $valveState;

    /**
     * @var bool
     *
     * @ORM\Column(name="pumpState", type="boolean", nullable=true)
     */
    private $pumpState;
    
    public function __construct($airTemp, $poolTemp, $panelTemp, $luminosity, $valveState, $pumpState)
    {
    	$this->date = new \Datetime("now");
    	$this->airTemp    = $airTemp;
    	$this->poolTemp   = $poolTemp;
    	$this->panelTemp  = $panelTemp;
    	$this->luminosity = $luminosity;
    	$this->valveState = $valveState;
    	$this->pumpState  = $pumpState;
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return MbSensorData
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set airTemp
     *
     * @param float $airTemp
     *
     * @return MbSensorData
     */
    public function setAirTemp($airTemp)
    {
        $this->airTemp = $airTemp;

        return $this;
    }

    /**
     * Get airTemp
     *
     * @return float
     */
    public function getAirTemp()
    {
        return floatval(number_format($this->airTemp, 2));
    }

    /**
     * Set poolTemp
     *
     * @param float $poolTemp
     *
     * @return MbSensorData
     */
    public function setPoolTemp($poolTemp)
    {
        $this->poolTemp = $poolTemp;

        return $this;
    }

    /**
     * Get poolTemp
     *
     * @return float
     */
    public function getPoolTemp()
    {
        return floatval(number_format($this->poolTemp, 2));
    }

    /**
     * Set panelTemp
     *
     * @param float $panelTemp
     *
     * @return MbSensorData
     */
    public function setPanelTemp($panelTemp)
    {
        $this->panelTemp = $panelTemp;

        return $this;
    }

    /**
     * Get panelTemp
     *
     * @return float
     */
    public function getPanelTemp()
    {
        return floatval(number_format($this->panelTemp, 2));
    }

    /**
     * Set luminosity
     *
     * @param float $luminosity
     *
     * @return MbSensorData
     */
    public function setLuminosity($luminosity)
    {
        $this->luminosity = $luminosity;

        return $this;
    }

    /**
     * Get luminosity
     *
     * @return float
     */
    public function getLuminosity()
    {
        return floatval(number_format($this->luminosity, 2));
    }

    /**
     * Set valveState
     *
     * @param boolean $valveState
     *
     * @return MbSensorData
     */
    public function setValveState($valveState)
    {
        $this->valveState = $valveState;

        return $this;
    }

    /**
     * Get valveState
     *
     * @return boolean
     */
    public function getValveState()
    {
        return $this->valveState;
    }

    /**
     * Set pumpState
     *
     * @param boolean $pumpState
     *
     * @return MbSensorData
     */
    public function setPumpState($pumpState)
    {
        $this->pumpState = $pumpState;

        return $this;
    }

    /**
     * Get pumpState
     *
     * @return boolean
     */
    public function getPumpState()
    {
        return $this->pumpState;
    }
}

