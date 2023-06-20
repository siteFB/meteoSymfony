<?php

namespace App\Entity;

//use App\Entity\Trait\CreatedAtTrait;
use App\Entity\Trait\SlugTrait;
use App\Repository\MessagerieRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessagerieRepository::class)]
class Messagerie
{
 
    use SlugTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $sujet;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $message = null;

    #[ORM\ManyToOne(inversedBy: 'expediteur')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $sender = null;

    #[ORM\ManyToOne(inversedBy: 'destinataire')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $recipient = null;

    //#[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: true)]
    //private ?DateTimeImmutable $created_at = null;

    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'], nullable: true)]
    private ?DateTimeImmutable $created_at = null;

    /*public function __construct()
    {
        $this->created_at = new \DatetimeImmutable();
        return $this->created_at;
    }*/

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSender(): ?Users
    {
        return $this->sender;
    }

    public function setSender(?Users $sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    public function getRecipient(): ?Users
    {
        return $this->recipient;
    }

    public function setRecipient(?Users $recipient): self
    {
        $this->recipient = $recipient;

        return $this;
    }

    public function getCreated_at(): ?DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreated_at(?DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

}
