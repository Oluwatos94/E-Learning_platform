<?php

namespace App\Entity;

use App\Repository\ProgressRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProgressRepository::class)]
class Progress
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $status = null;

    #[ORM\Column(name: 'last_accessed')]
    private ?\DateTimeImmutable $lastAccessed = null;

    #[ORM\ManyToOne(inversedBy: 'progresses')]
    private ?Enrollments $enrollments = null;

    #[ORM\ManyToOne(inversedBy: 'progresses')]
    private ?Lessons $lessons = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getLastAccessed(): ?\DateTimeImmutable
    {
        return $this->lastAccessed;
    }

    public function setLastAccessed(\DateTimeImmutable $lastAccessed): static
    {
        $this->lastAccessed = $lastAccessed;

        return $this;
    }

    public function getEnrollments(): ?Enrollments
    {
        return $this->enrollments;
    }

    public function setEnrollments(?Enrollments $enrollments): static
    {
        $this->enrollments = $enrollments;

        return $this;
    }

    public function getLessons(): ?Lessons
    {
        return $this->lessons;
    }

    public function setLessons(?Lessons $lessons): static
    {
        $this->lessons = $lessons;

        return $this;
    }
}
