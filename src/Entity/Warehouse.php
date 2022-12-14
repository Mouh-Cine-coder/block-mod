<?php

namespace App\Entity;

use App\Repository\WarehouseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: WarehouseRepository::class)]
#[ApiResource]
class Warehouse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $warehouseName = null;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phoneNumber = null;

    #[ORM\Column]
    private ?int $maxCells = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $warehouseImage = null;

    #[ORM\OneToMany(mappedBy: 'warehouse', targetEntity: Product::class)]
    private Collection $products;

    #[ORM\OneToMany(mappedBy: 'warehouse', targetEntity: User::class)]
    private Collection $employees;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->worksIn = new ArrayCollection();
        $this->employees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWarehouseName(): ?string
    {
        return $this->warehouseName;
    }

    public function setWarehouseName(string $warehouseName): self
    {
        $this->warehouseName = $warehouseName;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getMaxCells(): ?int
    {
        return $this->maxCells;
    }

    public function setMaxCells(int $maxCells): self
    {
        $this->maxCells = $maxCells;

        return $this;
    }

    public function getWarehouseImage(): ?string
    {
        return $this->warehouseImage;
    }

    public function setWarehouseImage(?string $warehouseImage): self
    {
        $this->warehouseImage = $warehouseImage;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setWarehouse($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getWarehouse() === $this) {
                $product->setWarehouse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    public function addEmployee(User $employee): self
    {
        if (!$this->employees->contains($employee)) {
            $this->employees->add($employee);
            $employee->setWarehouse($this);
        }

        return $this;
    }

    public function removeEmployee(User $employee): self
    {
        if ($this->employees->removeElement($employee)) {
            // set the owning side to null (unless already changed)
            if ($employee->getWarehouse() === $this) {
                $employee->setWarehouse(null);
            }
        }

        return $this;
    }
}
