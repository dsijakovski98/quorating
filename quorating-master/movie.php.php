<?php

class Movie implements Damage
{
    private $id;
    private $name;
    private $director;
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
    public function __construct($id, $name,string $image,string $description,string $director=NULL,string $genre=NULL)
    {
        $this->id = $id;
        $this->name=$name;
        $this->director = $director;
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
     * @return Director
     */
    public function getDirector(): Director
    {
        return $this->director;
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