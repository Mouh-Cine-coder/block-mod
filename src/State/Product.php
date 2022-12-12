<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Metadata\DeleteOperationInterface;

class ProductProcessor implements ProcessorInterface
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;   
    }
    /**
     * {@inheritDoc}
     */
    public function process($data, Operation $operation, array $uriVariables = [], array $context = []): void
    {
        // Handle the state
        if ($operation instanceof DeleteOperationInterface) {
            $this->removeProcessor->process($data, $operation, $uriVariables, $context);
        }
        $data->setDateCreation(new \DateTime());
        $this->em->persist($data);
        $this->em->flush();
    }
}
