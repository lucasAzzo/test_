<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity
 */
class Tag
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="BlogPost",inversedBy="tags")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_blog_post", referencedColumnName="id")
     * })
     */
    private $idBlogPost;

   
    public function getId()
    {
        return $this->id;
    }

    
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getIdBlogPost() {
        return $this->idBlogPost;
    }

    public function setIdBlogPost($idBlogPost) {
        $this->idBlogPost = $idBlogPost;
    }

    public function __toString() {
        return (string) $this->name;
    }


}