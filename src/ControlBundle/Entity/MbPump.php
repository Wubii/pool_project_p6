<?php

namespace ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MbPump
 *
 * @ORM\Table(name="mb_pump")
 * @ORM\Entity(repositoryClass="ControlBundle\Repository\MbPumpRepository")
 */
class MbPump
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
     * @var bool
     *
     * @ORM\Column(name="state", type="boolean", nullable=true)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="relayName", type="string", length=255, nullable=true)
     */
    private $relayName;


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
     * Set state
     *
     * @param boolean $state
     *
     * @return MbPump
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
     * Set name
     *
     * @param string $name
     *
     * @return MbPump
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
     * Set relayName
     *
     * @param string $relayName
     *
     * @return MbPump
     */
    public function setRelayName($relayName)
    {
        $this->relayName = $relayName;

        return $this;
    }

    /**
     * Get relayName
     *
     * @return string
     */
    public function getRelayName()
    {
        return $this->relayName;
    }
}

