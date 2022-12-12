<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\State\ProductProcessor;
use ApiPlatform\Metadata\Post;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[Post(processor: ProductProcessor::class)]
#[ApiResource]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $productName = null;

    #[ORM\Column]
    private ?float $quantity = null;

    #[ORM\Column]
    private ?float $priceUnit = null;

    #[ORM\Column]
    private ?float $mass = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column]
    private ?int $cellOccupation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $productImage = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Warehouse $warehouse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): self
    {
        $this->productName = $productName;

        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPriceUnit(): ?float
    {
        return $this->priceUnit;
    }

    public function setPriceUnit(float $priceUnit): self
    {
        $this->priceUnit = $priceUnit;

        return $this;
    }

    public function getMass(): ?float
    {
        return $this->mass;
    }

    public function setMass(float $mass): self
    {
        $this->mass = $mass;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getCellOccupation(): ?int
    {
        return $this->cellOccupation;
    }

    public function setCellOccupation(int $cellOccupation): self
    {
        $this->cellOccupation = $cellOccupation;

        return $this;
    }

    public function getProductImage(): ?string
    {
        return $this->productImage;
    }

    public function setProductImage(?string $productImage): self
    {
        $this->productImage = $productImage;

        return $this;
    }

    public function getWarehouse(): ?Warehouse
    {
        return $this->warehouse;
    }

    public function setWarehouse(?Warehouse $warehouse): self
    {
        $this->warehouse = $warehouse;

        return $this;
    }
}
