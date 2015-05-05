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

    public function __construct($points, FareTable $fareTable, StopRepository $stopRepository)
    {
        $this->initialFare = $stopRepository->get($points[0])->getCity()->createInitialFee();
        for ($i = 1; $i < count($points); $i++) {
            $path = $fareTable->addressGet($points[$i - 1], $points[$i]);
            $this->runningPaths[] = new RunningPath($path);
        }
    }

    public function run()
    {
        $summary = new Summary();
        $summary->totalFare = $this->initialFare->getFare();
        $summary->restDistance = $this->initialFare->getDistance();

        array_reduce($this->runningPaths, function($summary, $runningPath) {
            /** @var RunningPath $runningPath */
            return $runningPath->run($summary);
        }, $summary);

        return $summary;
    }
}
