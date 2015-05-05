<?php
namespace Yokohena\M20150418\Model;

use PHPMentors\DomainKata\Entity\EntityInterface;

class Stop implements EntityInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var City
     */
    private $city;

    public function __construct($name, City $city)
    {
        $this->name = $name;
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return City
     */
    public function getCity()
    {
        return $this->city;
    }
}
