<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $prixU;

    /**
     * @ORM\Column(type="integer")
     */
    private $qte;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $idP;

    /**
     * @ORM\Column(type="integer")
     */
    private $idU;








    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixU(): ?float
    {
        return $this->prixU;
    }

    public function setPrixU(float $prixU): self
    {
        $this->prixU = $prixU;

        return $this;
    }

    public function getQte(): ?int
    {
        return $this->qte;
    }

    public function setQte(int $qte): self
    {
        $this->qte = $qte;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIdP(): ?int
    {
        return $this->idP;
    }

    public function setIdP(int $idP): self
    {
        $this->idP = $idP;

        return $this;
    }

    public function getIdU(): ?int
    {
        return $this->idU;
    }

    public function setIdU(int $idU): self
    {
        $this->idU = $idU;

        return $this;
    }



}
