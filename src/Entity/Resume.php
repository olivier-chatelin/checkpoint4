<?php

namespace App\Entity;

use App\Repository\ResumeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResumeRepository::class)
 */
class Resume
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="resumes")
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity=Template::class, cascade={"persist", "remove"})
     */
    private $template;

    /**
     * @ORM\OneToOne(targetEntity=Detail::class, cascade={"persist", "remove"})
     */
    private $detail;

    /**
     * @ORM\OneToOne(targetEntity=Profile::class, cascade={"persist", "remove"})
     */
    private $profile;

    /**
     * @ORM\OneToMany(targetEntity=Experience::class, mappedBy="resume")
     */
    private $experiences;

    /**
     * @ORM\OneToMany(targetEntity=Skill::class, mappedBy="resume")
     */
    private $skills;

    /**
     * @ORM\OneToMany(targetEntity=Scholarship::class, mappedBy="resume")
     */
    private $scholarships;

    /**
     * @ORM\ManyToMany(targetEntity=Hobby::class)
     */
    private $hobbies;

    /**
     * @ORM\ManyToMany(targetEntity=Language::class)
     */
    private $languages;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $html;

    public function __construct()
    {
        $this->experiences = new ArrayCollection();
        $this->skills = new ArrayCollection();
        $this->scholarships = new ArrayCollection();
        $this->hobbies = new ArrayCollection();
        $this->languages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }


    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTemplate(): ?Template
    {
        return $this->template;
    }

    public function setTemplate(?Template $template): self
    {
        $this->template = $template;

        return $this;
    }

    public function getDetail(): ?Detail
    {
        return $this->detail;
    }

    public function setDetail(?Detail $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    public function getProfile(): ?Profile
    {
        return $this->profile;
    }

    public function setProfile(?Profile $profile): self
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * @return Collection|Experience[]
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experience $experience): self
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences[] = $experience;
            $experience->setResume($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): self
    {
        if ($this->experiences->removeElement($experience)) {
            // set the owning side to null (unless already changed)
            if ($experience->getResume() === $this) {
                $experience->setResume(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
            $skill->setResume($this);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        if ($this->skills->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getResume() === $this) {
                $skill->setResume(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Scholarship[]
     */
    public function getScholarships(): Collection
    {
        return $this->scholarships;
    }

    public function addScholarship(Scholarship $scholarship): self
    {
        if (!$this->scholarships->contains($scholarship)) {
            $this->scholarships[] = $scholarship;
            $scholarship->setResume($this);
        }

        return $this;
    }

    public function removeScholarship(Scholarship $scholarship): self
    {
        if ($this->scholarships->removeElement($scholarship)) {
            // set the owning side to null (unless already changed)
            if ($scholarship->getResume() === $this) {
                $scholarship->setResume(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Hobby[]
     */
    public function getHobbies(): Collection
    {
        return $this->hobbies;
    }

    public function addHobby(Hobby $hobby): self
    {
        if (!$this->hobbies->contains($hobby)) {
            $this->hobbies[] = $hobby;
        }

        return $this;
    }

    public function removeHobby(Hobby $hobby): self
    {
        $this->hobbies->removeElement($hobby);

        return $this;
    }

    /**
     * @return Collection|Language[]
     */
    public function getLanguages(): Collection
    {
        return $this->languages;
    }

    public function addLanguage(Language $language): self
    {
        if (!$this->languages->contains($language)) {
            $this->languages[] = $language;
        }

        return $this;
    }

    public function removeLanguage(Language $language): self
    {
        $this->languages->removeElement($language);

        return $this;
    }

    public function getHtml(): ?string
    {
        return $this->html;
    }

    public function setHtml(?string $html): self
    {
        $this->html = $html;

        return $this;
    }
}
