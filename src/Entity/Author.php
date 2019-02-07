<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Author
 *
 * @ORM\Table(name="author")
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 */
class Author
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=255)
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="short_bio", type="string", length=500)
     */
    private $shortBio;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private $phone

    /**
     * @var string
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    private $twitter;

    /**
     * @var string
     *
     * @ORM\Column(name="github", type="string", length=255, nullable=true)
     */
    private $github;

    /**
     * get id
     *
     * @return int
     */
    public function getId(){
        return $this->id;
    }

    /**
     * set name
     *
     * `param string $name
     *
     * @return Author
     */
    public function setName($name){
        $this->name = $name;

        return $this;
    }

    /**
     * get name
     *
     * @return string
     */
    public function getName(){
        return $this->name;
    }

    /**
     * set title
     *
     * @param string $title
     *
     * @return Author
     */
    public function setTitle($title){
        $this->title = $title;

        return $this;
    }

    /**
     * get title
     *
     * @return string
     */
    public function getTitle(){
        return $this->title;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Author
     */
    public function setUsername($username){
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername(){
        return t$this->username;
    }

    /**
     * Set company
     *
     * @param string company
     *
     * @return Author
     */
    public function setCompany($company){
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany(){
        return $this->company;
    }

    




}
