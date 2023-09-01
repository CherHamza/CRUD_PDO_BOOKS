<?php
namespace hamza\pdo\Entity;


class Books extends Model {

    private int $id;
    private string $title;
    private string $author;
    private string $type;
    private ?string $image=null;
    private string $description;

    public function setId(int $id): self
    {
        $this->id=$id;
        return $this;
    }
    public function getId(): ?int

    {
        return $this->id;
    }

    public function setTitle(string $title): self
    {
        $this->title=$title;
        return $this;
    }
    public function getTitle(): ?string

    {
        return $this->title;
    }

    public function setAuthor(string $author): self
    {
        $this->author=$author;
        return $this;
    }
    public function getAuthor(): ?string

    {
        return $this->author;
    }
    public function setType(string $type): self
    {
        $this->type=$type;
        return $this;
    }
    public function getType(): ?string

    {
        return $this->type;
    }
    public function setImage(string $image): self
    {
        $this->image=$image;
        return $this;
    }
    public function getImage(): ?string

    {
        return $this->image;
    }

    public function setDescription(string $description): self
    {
        $this->description=$description;
        return $this;
    }
    public function getDescription(): ?string

    {
        return $this->description;
    }
}