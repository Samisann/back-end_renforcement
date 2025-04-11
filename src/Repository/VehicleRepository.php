<?php

namespace App\Repository;

use App\Entity\Vehicle;
use Doctrine\ORM\EntityManagerInterface;

class VehicleRepository
{
    public function __construct(private EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function save(Vehicle $vehicle): void
    {
        $this->em->persist($vehicle);
        $this->em->flush();
    }

    public function delete(Vehicle $vehicle): void
    {
        $this->em->remove($vehicle);
        $this->em->flush();
    }

    public function findById(int $id): ?Vehicle
    {
        return $this->em->find(Vehicle::class, $id);
    }

    public function findAll(): array
    {
        return $this->em->getRepository(Vehicle::class)->findAll();
    }
    public function update(Vehicle $vehicle): void
    {
        $this->em->flush();
    }


}
