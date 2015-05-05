<?php
namespace Yokohena\M20150418;

use Stringy\StaticStringy as String;
use Yokohena\M20150418\Model\City;
use Yokohena\M20150418\Model\Stop;
use Yokohena\M20150418\Model\StopRepository;
use Yokohena\M20150418\Model\FareTable;
use Yokohena\M20150418\Model\Running;

class M20150418
{
    /**
     * @var FareTable
     */
    private $fareTable;

    /**
     * @var StopRepository
     */
    private $stopRepository;

    public function __construct()
    {
        $city1 = new City('円來市', 995, 400, 200, 60);
        $city2 = new City('炭州市', 845, 350, 200, 50);
        $this->fareTable = new FareTable(['A', 'B', 'C', 'D', 'E', 'F', 'G'], function () {
            return null;
        });

        $stopA = new Stop('A', $city1);
        $stopB = new Stop('B', $city1);
        $stopC = new Stop('C', $city1);
        $stopD = new Stop('D', $city2);
        $stopE = new Stop('E', $city2);
        $stopF = new Stop('F', $city2);
        $stopG = new Stop('G', $city2);

        $this->stopRepository = new StopRepository();
        $this->stopRepository->add($stopA);
        $this->stopRepository->add($stopB);
        $this->stopRepository->add($stopC);
        $this->stopRepository->add($stopD);
        $this->stopRepository->add($stopE);
        $this->stopRepository->add($stopF);
        $this->stopRepository->add($stopG);

        $this->fareTable->setPath('A', 'B', 1090, $city1);
        $this->fareTable->setPath('A', 'C',  180, $city1);
        $this->fareTable->setPath('A', 'D',  540, $city2);
        $this->fareTable->setPath('B', 'G', 1270, $city1);
        $this->fareTable->setPath('B', 'C',  960, $city1);
        $this->fareTable->setPath('C', 'D',  400, $city2);
        $this->fareTable->setPath('C', 'F',  200, $city1);
        $this->fareTable->setPath('D', 'E',  720, $city2);
        $this->fareTable->setPath('D', 'F',  510, $city2);
        $this->fareTable->setPath('E', 'G', 1050, $city2);
        $this->fareTable->setPath('F', 'G',  230, $city2);
    }

    public function solve($input)
    {
        $inputData = $this->parseInput($input);

        $running = new Running($inputData, $this->fareTable, $this->stopRepository);
        $running->run();
        return $running->totalFee();
    }

    public function parseInput($input)
    {
        return String::chars($input);
    }
}
