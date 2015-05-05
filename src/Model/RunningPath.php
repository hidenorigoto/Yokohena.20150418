<?php
namespace Yokohena\M20150418\Model;

use PHPMentors\DomainKata\Entity\EntityInterface;

class RunningPath implements EntityInterface
{
    /**
     * メーターアップ回数
     * @var int
     */
    private $meterCount = 0;

    /**
     * @var Path
     */
    private $path;

    /**
     * この区間での運賃
     * @var int
     */
    private $fare = 0;

    public function __construct(Path $path)
    {
        $this->path = $path;
    }

    public function run($initialDistance, InitialFare $initialFee)
    {
        $pathDistance = $this->runWithInitialFare($initialFee);

        $distanceDivision = $this->getPath()->getCity()->getDistanceDivision();
        $restDistance = ($pathDistance + $initialDistance) % $distanceDivision;
        $this->meterCount += floor(($pathDistance + $initialDistance) / $distanceDivision);
        $this->fare += $this->meterCount * $this->getPath()->getCity()->getDistanceFare();

        return $restDistance;
    }

    private function runWithInitialFare(InitialFare $initialFare)
    {
        $pathDistance = $this->getPath()->getDistance();

        if ($initialFare->getDistance() === 0) {
            return $pathDistance;
        }

        if ($pathDistance > $initialFare->getDistance()) {
            $pathDistance -= $initialFare->getDistance();
            $initialFare->setDistance(0);
            $this->meterCount++;
        } else {
            $initialFare->runDistance($pathDistance);
            $pathDistance = 0;
        }

        return $pathDistance;
    }

    /**
     * @return Path
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return int
     */
    public function getFare()
    {
        return $this->fare;
    }
}
