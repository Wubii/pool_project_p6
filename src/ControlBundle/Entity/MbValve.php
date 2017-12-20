<?php

namespace ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MbValve
 *
 * @ORM\Table(name="mb_valve")
 * @ORM\Entity(repositoryClass="ControlBundle\Repository\MbValveRepository")
 */
class MbValve
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
     * @ORM\Column(name="state", type="integer", nullable=true)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="relayOpenName", type="string", length=255, nullable=true, unique=true)
     */
    private $relayOpenName;

    /**
     * @var string
     *
     * @ORM\Column(name="relayCloseName", type="string", length=255, nullable=true)
     */
    private $relayCloseName;

    /**
     * @var int
     *
     * @ORM\Column(name="timeToOpen", type="integer", nullable=true)
     */
    private $timeToOpen;

    /**
     * @var int
     *
     * @ORM\Column(name="timeToClose", type="integer", nullable=true)
     */
    private $timeToClose;


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
     * @return MbValve
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
     * Set state
     *
     * @param boolean $state
     *
     * @return MbValve
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return bool
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set relayOpenName
     *
     * @param string $relayOpenName
     *
     * @return MbValve
     */
    public function setRelayOpenName($relayOpenName)
    {
        $this->relayOpenName = $relayOpenName;

        return $this;
    }

    /**
     * Get relayOpenName
     *
     * @return string
     */
    public function getRelayOpenName()
    {
        return $this->relayOpenName;
    }

    /**
     * Set relayCloseName
     *
     * @param string $relayCloseName
     *
     * @return MbValve
     */
    public function setRelayCloseName($relayCloseName)
    {
        $this->relayCloseName = $relayCloseName;

        return $this;
    }

    /**
     * Get relayCloseName
     *
     * @return string
     */
    public function getRelayCloseName()
    {
        return $this->relayCloseName;
    }

    /**
     * Set timeToOpen
     *
     * @param integer $timeToOpen
     *
     * @return MbValve
     */
    public function setTimeToOpen($timeToOpen)
    {
        $this->timeToOpen = $timeToOpen;

        return $this;
    }

    /**
     * Get timeToOpen
     *
     * @return int
     */
    public function getTimeToOpen()
    {
        return $this->timeToOpen;
    }

    /**
     * Set timeToClose
     *
     * @param integer $timeToClose
     *
     * @return MbValve
     */
    public function setTimeToClose($timeToClose)
    {
        $this->timeToClose = $timeToClose;

        return $this;
    }

    /**
     * Get timeToClose
     *
     * @return int
     */
    public function getTimeToClose()
    {
        return $this->timeToClose;
    }
}

