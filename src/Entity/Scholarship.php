<?php

namespace App\Entity;

use App\Repository\ScholarshipRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScholarshipRepository::class)
 */
class Scholarship
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
    private $graduation;

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

    /**
     * @ORM\ManyToOne(targetEntity=Resume::class, inversedBy="scholarships",cascade={"persist"})
     */
    private $resume;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $school;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGraduation(): ?string
    {
        return $this->graduation;
    }

    public function setGraduation(?string $graduation): self
    {
        $this->graduation = $graduation;

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

    public function getResume(): ?Resume
    {
        return $this->resume;
    }

    public function setResume(?Resume $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getSchool(): ?string
    {
        return $this->school;
    }

    public function setSchool(?string $school): self
    {
        $this->school = $school;

        return $this;
    }
}
