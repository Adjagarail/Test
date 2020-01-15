<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ArticlesRepository")
 * @Vich\Uploadable
 */
class Articles
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Postere;

    /**
     * @Vich\UploadableField(mapping="article_images", fileNameProperty="Postere")
     * @var File
     */
    private $imageFile;
    
    /**
     * @ORM\Column(type="text")
     */
    private $Article;

    /**
     * @ORM\Column(type="date")
     */
    private $DatePublication;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="articles")
     */
    private $Categorie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getPostere(): ?string
    {
        return $this->Postere;
    }

    public function setPostere(string $Postere): self
    {
        $this->Postere = $Postere;

        return $this;
    }

    public function setImageFile(File $Postere = null)
    {
        $this->imageFile = $Postere;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getArticle(): ?string
    {
        return $this->Article;
    }

    public function setArticle(string $Article): self
    {
        $this->Article = $Article;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->DatePublication;
    }

    public function setDatePublication(\DateTimeInterface $DatePublication): self
    {
        $this->DatePublication = $DatePublication;

        return $this;
    }

    public function getCategorie(): ?Categories
    {
        return $this->Categorie;
    }

    public function setCategorie(?Categories $Categorie): self
    {
        $this->Categorie = $Categorie;

        return $this;
    }
}
