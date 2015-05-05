<?php
namespace Yokohena\M20150418\Model;

use PHPMentors\DomainCommons\Matrix\AddressedMatrix;

class FareTable extends AddressedMatrix
{
    public function setPath($from, $to, $distance, $city)
    {
        $path = new Path($city, $distance);
        $this->addressSet($from, $to, $path);
        $this->addressSet($to, $from, $path);
    }
}
