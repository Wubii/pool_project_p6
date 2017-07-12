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
     * @var \stdClass
     *
     * @ORM\OneToOne(targetEntity="MbValve", cascade={"persist"})
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
    private $light;


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
     * Set light
     *
     * @param \stdClass $light
     *
     * @return MbSetup
     */
    public function setLight($light)
    {
        $this->light = $light;

        return $this;
    }

    /**
     * Get light
     *
     * @return \stdClass
     */
    public function getLight()
    {
        return $this->light;
    }
}

