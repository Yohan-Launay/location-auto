<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $licenceNumber = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column]
    private ?int $phone = null;

    #[ORM\OneToMany(mappedBy: 'customer', targetEntity: Renting::class)]
    private Collection $renting;

    public function __construct()
    {
        $this->renting = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getLicenceNumber(): ?string
    {
        return $this->licenceNumber;
    }

    public function setLicenceNumber(string $licenceNumber): static
    {
        $this->licenceNumber = $licenceNumber;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): static
    {
        $this->phone = $phone;

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
            $renting->setCustomer($this);
        }

        return $this;
    }

    public function removeRenting(Renting $renting): static
    {
        if ($this->renting->removeElement($renting)) {
            // set the owning side to null (unless already changed)
            if ($renting->getCustomer() === $this) {
                $renting->setCustomer(null);
            }
        }

        return $this;
    }
}
