<?php
namespace Yokohena\M20150418\Model;

use PHPMentors\DomainKata\Entity\EntityInterface;
use PHPMentors\DomainKata\Repository\RepositoryInterface;

class StopRepository implements RepositoryInterface
{
    private $stops = [];

    /**
     * @param EntityInterface $entity
     */
    public function add(EntityInterface $entity)
    {
        /** @var Stop $entity */
        assert($entity instanceof Stop);
        $this->stops[$entity->getName()] = $entity;
    }

    /**
     * @param $name
     * @return Stop
     */
    public function get($name)
    {
        return $this->stops[$name];
    }

    /**
     * @param EntityInterface $entity
     */
    public function remove(EntityInterface $entity)
    {
        // TODO: Implement remove() method.
    }
}
