<?php

class Book implements Damage
{
    private $id;
    private $name;
    private $author;
    private $publisher;
    private $genre;
    private $image;
    private $description;
    private static $objects=[];

    /**
     * Book constructor.
     * @param $id
     * @param $author
     * @param $publisher
     * @param $genre
     * @param $image
     * @param $description
     */
    public function __construct($id, $name,string $image,string $description,Author $author=NULL,Publishers $publisher=NULL, Genre $genre=NULL)
    {
        $this->id = $id;
        $this->name=$name;
        $this->author = $author;
        $this->publisher = $publisher;
        $this->genre = $genre;
        $this->image = $image;
        $this->description = $description;
        Book::$objects[$this->id]=$this;
    }

    public function damageAllData()
    {
        $this->id=NULL;
        $this->name=NULL;
        $this->author=NULL;
        $this->image=NULL;
        $this->description=NULL;
        $this->genre=NULL;
    }

    /**
     * @return mixed
     */
    public function getId():int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * @return publisher
     */
    public function getPublisher(): Publishers
    {
        return $this->publisher;
    }

    /**
     * @return Genre
     */
    public function getGenre(): Genre
    {
        return $this->genre;
    }


    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return array
     */
    public static function getObjects(): array
    {
        return self::$objects;
    }

}