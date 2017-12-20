<?php

namespace ControlBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * MbProgram
 *
 * @ORM\Table(name="mb_program")
 * @ORM\Entity(repositoryClass="ControlBundle\Repository\MbProgramRepository")
 */
class MbProgram
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
     * @var \stdClass
     * @ORM\ManyToMany(targetEntity="MbScheduleTimesheet", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="mb_program_schedule",
     *      joinColumns={@ORM\JoinColumn(name="program_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="timesheet_id", referencedColumnName="id", unique=true)})
     */
    private $entries;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    public function __construct($name)
    {
        $this->entries = new ArrayCollection();
        $this->name = $name;
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
     * Set entries
     *
     * @param \stdClass $entries
     *
     * @return MbProgram
     */
    public function setEntries($entries)
    {
        $this->entries = $entries;

        return $this;
    }

    /**
     * Get entries
     *
     * @return \stdClass
     */
    public function getEntries()
    {
        return $this->entries;
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
}

