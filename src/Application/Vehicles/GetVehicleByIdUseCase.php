<?php


namespace App\Application;

use App\Repository\VehicleRepository;

class GetVehicleByIdUseCase
{
    public function __construct(private VehicleRepository $repository)
    {
    }

    public function execute(int $id): object
    {
        $vehicle = $this->repository->findById($id);

        if (!$vehicle) {
            throw new \InvalidArgumentException('Vehicle not found');
        }

        return $vehicle;
    }
}