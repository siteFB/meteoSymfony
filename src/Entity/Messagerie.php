<?php

namespace App\Entity;

use App\Repository\MessagerieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessagerieRepository::class)]
class Messagerie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'messages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $users_expediteur = null;

    #[ORM\ManyToOne(inversedBy: 'mess')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $users_destinataire = null;

    #[ORM\Column(length: 30)]
    private ?string $sujet = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $message = null;

    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsersExpediteur(): ?Users
    {
        return $this->users_expediteur;
    }

    public function setUsersExpediteur(?Users $users_expediteur): self
    {
        $this->users_expediteur = $users_expediteur;

        return $this;
    }

    public function getIdDestinataire(): ?Users
    {
        return $this->users_destinataire;
    }

    public function setIdDestinataire(?Users $id_destinataire): self
    {
        $this->users_destinataire = $id_destinataire;

        return $this;
    }

    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(string $sujet): self
    {
        $this->sujet = $sujet;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
