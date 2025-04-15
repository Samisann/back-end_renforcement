<?php


namespace App\Application;

use App\Repository\VehicleRepository;

class UpdateVehicleUseCase
{
    public function __construct(private VehicleRepository $repository)
    {
    }

    public function execute(int $id, string $brand, string $model, float $dailyRate): void
    {
        $vehicle = $this->repository->findById($id);

        if (!$vehicle) {
            throw new \InvalidArgumentException('Impossible de trouver le véhicule.');
        }

        $vehicle->mettreAJour($brand, $model, $dailyRate);
        $this->repository->update($vehicle);
    }
}