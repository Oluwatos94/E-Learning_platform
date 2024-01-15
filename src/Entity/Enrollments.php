<?php

namespace App\Entity;

use App\Repository\EnrollmentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnrollmentsRepository::class)]
class Enrollments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name: "enrollment_date")]
    private ?\DateTimeImmutable $enrollmentDate = null;

    #[ORM\ManyToOne(targetEntity: Users::class, inversedBy: 'enrollments')]
    #[ORM\JoinColumn(nullable: false)]
    public ?Users $users = null;

    #[ORM\ManyToOne(targetEntity: Courses::class, inversedBy: 'enrollments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Courses $courses = null;

    #[ORM\OneToMany(mappedBy: 'enrollment', targetEntity: Progress::class)]
    private Collection $progresses;

    public function __construct()
    {
        $this->progresses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnrollmentDate(): ?\DateTimeImmutable
    {
        return $this->enrollmentDate;
    }

    public function setEnrollmentDate(?\DateTimeImmutable $enrollmentDate): static
    {
        $this->enrollmentDate = $enrollmentDate;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): static
    {
        $this->users = $users;

        return $this;
    }

    public function getCourses(): ?Courses
    {
        return $this->courses;
    }

    public function setCourses(?Courses $courses): static
    {
        $this->courses = $courses;

        return $this;
    }

    /**
     * @return Collection<int, Progress>
     */
    public function getProgresses(): Collection
    {
        return $this->progresses;
    }

    public function addProgress(Progress $progress): static
    {
        if (!$this->progresses->contains($progress)) {
            $this->progresses->add($progress);
            $progress->setEnrollments($this);
        }

        return $this;
    }

    public function removeProgress(Progress $progress): static
    {
        if ($this->progresses->removeElement($progress)) {
            // set the owning side to null (unless already changed)
            if ($progress->getEnrollments() === $this) {
                $progress->setEnrollments(null);
            }
        }

        return $this;
    }
}
