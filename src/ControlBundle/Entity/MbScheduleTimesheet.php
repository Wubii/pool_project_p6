<?php

namespace ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MbScheduleTimesheet
 *
 * @ORM\Table(name="mb_schedule_timesheet")
 * @ORM\Entity(repositoryClass="ControlBundle\Repository\MbScheduleTimesheetRepository")
 */
class MbScheduleTimesheet
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
     * @ORM\Column(name="hour", type="time", unique=true)
     */
    private $hour;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;
    
    public function __construct($hour)
    {
    	$this->setHour($hour);
    	$this->setStatus(0);
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
     * Set hour
     *
     * @param \DateTime $hour
     *
     * @return MbScheduleTimesheet
     */
    public function setHour($hour)
    {
        $this->hour = $hour;

        return $this;
    }

    /**
     * Get hour
     *
     * @return \DateTime
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return MbScheduleTimesheet
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }
}

