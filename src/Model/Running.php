<?php
namespace Yokohena\M20150418\Model;

use PHPMentors\DomainKata\Entity\EntityInterface;

class Running implements EntityInterface
{
    /**
     * @var InitialFare
     */
    private $initialFare;
    /**
     * @var RunningPath[]
     */
    private $runningPaths = [];

    public function __construct($points, FareTable $feeMatrix, StopRepository $stopRepository)
    {
        $this->initialFare = $stopRepository->get($points[0])->getCity()->createInitialFee();
        for ($i = 1; $i < count($points); $i++) {
            $path = $feeMatrix->addressGet($points[$i - 1], $points[$i]);
            $runningPath = new RunningPath($path);
            $this->runningPaths[] = $runningPath;
        }
    }

    public function run()
    {
        array_reduce($this->runningPaths, function($rest, $runningPath) {
            /** @var RunningPath $runningPath */
            return $runningPath->run($rest, $this->initialFare);
        }, 0);
    }

    public function totalFee()
    {
        return array_reduce($this->runningPaths, function ($current, $runningPath) {
            /** @var RunningPath $runningPath */
            return $current + $runningPath->getFare();
        }, $this->initialFare->getFare());
    }
}
