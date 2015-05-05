<?php
namespace Yokohena\M20150418\Model;

use PHPMentors\DomainKata\Entity\EntityInterface;

class RunningPath implements EntityInterface
{
    /**
     * @var Path
     */
    private $path;

    public function __construct(Path $path)
    {
        $this->path = $path;
    }

    public function run(Summary $summary)
    {
        $costDistance = $this->path->getDistance() - $summary->restDistance;

        if ($costDistance <= 0) {
            $summary->restDistance = abs($costDistance);
        } else {
            $division = $this->path->getCity()->getDistanceDivision();
            $fare = $this->path->getCity()->getDistanceFare();
            $summary->restDistance = $division - $costDistance % $division;
            $summary->totalFare += (floor($costDistance / $division) + 1) * $fare;
        }

        return $summary;
    }
}
