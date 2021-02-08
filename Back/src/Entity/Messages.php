<?php

namespace App\Entity;

use App\Repository\MessagesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessagesRepository::class)
 */
class Messages
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="messages")
     */
    private $receveur;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="envoyeur")
     */
    private $envoyeur;

    public function __construct()
    {
        $this->receveur = new ArrayCollection();
        $this->envoyeur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|User[]
     */
    public function getReceveur(): Collection
    {
        return $this->receveur;
    }

    public function addReceveur(User $receveur): self
    {
        if (!$this->receveur->contains($receveur)) {
            $this->receveur[] = $receveur;
        }

        return $this;
    }

    public function removeReceveur(User $receveur): self
    {
        $this->receveur->removeElement($receveur);

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getEnvoyeur(): Collection
    {
        return $this->envoyeur;
    }

    public function addEnvoyeur(User $envoyeur): self
    {
        if (!$this->envoyeur->contains($envoyeur)) {
            $this->envoyeur[] = $envoyeur;
        }

        return $this;
    }

    public function removeEnvoyeur(User $envoyeur): self
    {
        $this->envoyeur->removeElement($envoyeur);

        return $this;
    }

}
