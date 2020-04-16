<?php

class Game implements Damage
{
    private $id;
    private $name;
    private $developer;
    private $genre;
    private $image;
    private $description;
    private static $objects=[];

    /**
     * Book constructor.
     * @param $id
     * @param $developer
     * @param $genre
     * @param $image
     * @param $description
     */
    public function __construct($id, $name,string $image,string $description,string $developer=NULL, string $genre=NULL)
    {
        $this->id = $id;
        $this->name=$name;
        $this->developer = $developer;
        $this->genre = $genre;
        $this->image = $image;
        $this->description = $description;
        Book::$objects[$this->id]=$this;
    }

    public function damageAllData()
    {
        $this->id=NULL;
        $this->name=NULL;
        $this->developer=NULL;
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
     * @return Developer
     */
    public function getDeveloper(): Developer
    {
        return $this->developer;
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