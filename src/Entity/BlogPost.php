<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use http\Message\Body;

/**
 * BlogPost
 *
 * @ORM\Table(name="blog_post")
 * @ORM\Entity(repositoryClass="App\Repository\BlogPostRepository")
 * @ORM\HasLifecycleCallbacks
 */
class BlogPost
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=190)
     */
    private $title;


    /**
     *@var string
     *
     *@ORM\Column(name="slug", type="string", length=190, unique=true);
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=2000)
     */
    private $description;
    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var Author
     * @ORM\ManyToOne(targetEntity="Author")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     *@var \DateTime
     *
     *@ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * set title
     *
     * @param string $title
     * @return BlogPost
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
     * Set slug
     *
     * @param string $slug
     *
     * @return BlogPost
     */
    public function setSlug($slug){
        $this->slug = $slug;
        return $this;
    }

    /**
     * get slug
     *
     * @return string
     */
    public function getSlug(){
        return $this->slug;
    }

    /**
     * set description
     *
     * @param string description
     *
     * @return BlogPost
     */
    public function setDescription($description){
        $this->description = $description;
        return $this;
    }

    /**
     * get description
     *
     * @return string
     */
    public function getDescription(){
        return $this->description;
    }

    /**
     * set body
     *
     * @param string $body
     *
     * @return BlogPost
     */
    public function setBody($body){
        $this->body = $body;
        return $this;
    }

    /**
     * get body
     *
     * @return string
     */
    public function getBody(){
        return $this->body;
    }

    /**
     * set author
     *
     * @param Author $author
     *
     * @return BlogPost
     */
    public function setAuthor($author){
        $this->author = $author;
        return $this;
    }

    /**
     * get author
     *
     * @return Author
     */
    public function getAuthor(){
        return $this->author;
    }

    /**
     * set createdAt
     *
     * @param \DateTime
     *
     * @return BlogPost
     */
    public function setCreatedAt($createdAt){
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt(){
        return $this->createdAt;
    }

    /**
     * set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return BlogPost
     */
    public function setUpdatedAt($updatedAt){
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt(){
        return $this->updatedAt;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist(){
        if(!$this->getCreatedAt()){
            $this->setCreatedAt(new \DateTime());
        }
        if(!$this->getUpdatedAt()){
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate(){
        $this->setUpdatedAt(new \DateTime());
    }
}
