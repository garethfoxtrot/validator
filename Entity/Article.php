<?php

namespace App\Entity;

use App\Validator\UniqueArticle;
use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


// First solution with Constraint Validaton (it works)
/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 * @ORM\Table(name="`articles`",
 * uniqueConstraints={@ORM\UniqueConstraint(columns={"technology_id", "url"})}
 * )
 * @UniqueEntity(
 *      fields={"technology", "url"},
 *      message="Takie zagadnienie już istnieje w bazie danych! Proszę poprawić lub zmienić tematykę."
 * )
 */


 // Second solution with Constraint Validaton (in progess)
/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 * @ORM\Table(name="`articles`")
 * @UniqueArticle()
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Technology::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $technology;

    /**
     * @ORM\ManyToOne(targetEntity=Section::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $section;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTechnology(): ?Technology
    {
        return $this->technology;
    }

    public function setTechnology(?Technology $technology): self
    {
        $this->technology = $technology;

        return $this;
    }

    public function getSection(): ?Section
    {
        return $this->section;
    }

    public function setSection(?Section $section): self
    {
        $this->section = $section;

        return $this;
    }
}
