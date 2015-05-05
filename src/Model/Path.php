<?php
namespace Yokohena\M20150418\Model;

use PHPMentors\DomainKata\Entity\EntityInterface;

class Path implements EntityInterface
{
    /**
     * @var City
     */
    private $city;

    /**
     * @var integer
     */
    private $distance;

    public function __construct(City $city, $distance)
    {
        $this->city = $city;
        $this->distance = $distance;
    }

    /**
     * @return City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return int
     */
    public function getDistance()
    {
        return $this->distance;
    }
}
