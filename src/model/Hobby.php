<?php


class Hobby
{
    private $title;
    private $description;
    private $image;
    private $stars;
    private $id;
    private $user;
    private $date;

    public function __construct($id = null, $title, $description, $image, $stars = 0,  $user = null, $date = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->stars = $stars;
        $this->user = $user;
        $this->date = $date;
    }

    public function getStars()
    {
        return $this->stars;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUser()
    {
        return $this->user;
    }



}