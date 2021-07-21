<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExperienceRepository::class)
 */
class Experience
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $jobName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $employer;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $yearStart;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $yearEnd;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJobName(): ?string
    {
        return $this->jobName;
    }

    public function setJobName(?string $jobName): self
    {
        $this->jobName = $jobName;

        return $this;
    }

    public function getEmployer(): ?string
    {
        return $this->employer;
    }

    public function setEmployer(?string $employer): self
    {
        $this->employer = $employer;

        return $this;
    }

    public function getYearStart(): ?\DateTimeInterface
    {
        return $this->yearStart;
    }

    public function setYearStart(?\DateTimeInterface $yearStart): self
    {
        $this->yearStart = $yearStart;

        return $this;
    }

    public function getYearEnd(): ?\DateTimeInterface
    {
        return $this->yearEnd;
    }

    public function setYearEnd(?\DateTimeInterface $yearEnd): self
    {
        $this->yearEnd = $yearEnd;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
