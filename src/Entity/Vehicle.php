<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleRepository::class)]
class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $carBrand = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column(length: 255)]
    private ?string $registrationNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $color = null;

    #[ORM\Column]
    private ?float $basePrice = null;

    #[ORM\Column]
    private ?int $numberKilometers = null;

    #[ORM\OneToMany(mappedBy: 'vehicle', targetEntity: Renting::class)]
    private Collection $renting;

    public function __construct()
    {
        $this->renting = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarBrand(): ?string
    {
        return $this->carBrand;
    }

    public function setCarBrand(string $carBrand): static
    {
        $this->carBrand = $carBrand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getRegistrationNumber(): ?string
    {
        return $this->registrationNumber;
    }

    public function setRegistrationNumber(string $registrationNumber): static
    {
        $this->registrationNumber = $registrationNumber;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getBasePrice(): ?float
    {
        return $this->basePrice;
    }

    public function setBasePrice(float $basePrice): static
    {
        $this->basePrice = $basePrice;

        return $this;
    }

    public function getNumberKilometers(): ?int
    {
        return $this->numberKilometers;
    }

    public function setNumberKilometers(int $numberKilometers): static
    {
        $this->numberKilometers = $numberKilometers;

        return $this;
    }

    /**
     * @return Collection<int, Renting>
     */
    public function getRenting(): Collection
    {
        return $this->renting;
    }

    public function addRenting(Renting $renting): static
    {
        if (!$this->renting->contains($renting)) {
            $this->renting->add($renting);
            $renting->setVehicle($this);
        }

        return $this;
    }

    public function removeRenting(Renting $renting): static
    {
        if ($this->renting->removeElement($renting)) {
            // set the owning side to null (unless already changed)
            if ($renting->getVehicle() === $this) {
                $renting->setVehicle(null);
            }
        }

        return $this;
    }
}
