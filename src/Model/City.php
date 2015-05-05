<?php
namespace Yokohena\M20150418\Model;

use PHPMentors\DomainKata\Entity\EntityInterface;

class City implements EntityInterface
{
    private $name;
    private $initialDistance;
    private $initialFare;
    private $distanceDivision;
    private $distanceFare;

    public function __construct($name, $initialDistance, $initialFare, $distanceDivision, $distanceFare)
    {
        $this->name = $name;
        $this->initialDistance = $initialDistance;
        $this->initialFare = $initialFare;
        $this->distanceDivision = $distanceDivision;
        $this->distanceFare = $distanceFare;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getInitialDistance()
    {
        return $this->initialDistance;
    }

    /**
     * @return mixed
     */
    public function getInitialFare()
    {
        return $this->initialFare;
    }

    /**
     * @return mixed
     */
    public function getDistanceDivision()
    {
        return $this->distanceDivision;
    }

    /**
     * @return mixed
     */
    public function getDistanceFare()
    {
        return $this->distanceFare;
    }

    public function createInitialFee()
    {
        return new InitialFare($this->initialFare, $this->initialDistance);
    }
}
