<?php
namespace Yokohena\M20150418\Model;

use PHPMentors\DomainKata\Entity\EntityInterface;

class InitialFare implements EntityInterface
{
    /**
     * @var integer
     */
    private $fare;
    /**
     * @var integer
     */
    private $distance;

    public function __construct($fee, $distance)
    {
        $this->fare = $fee;
        $this->distance = $distance;
    }

    /**
     * @return mixed
     */
    public function getFare()
    {
        return $this->fare;
    }

    /**
     * @return mixed
     */
    public function getDistance()
    {
        return $this->distance;
    }

    public function setDistance($distance)
    {
        $this->distance = $distance;
    }

    public function runDistance($distance)
    {
        $this->distance -= $distance;
    }
}
