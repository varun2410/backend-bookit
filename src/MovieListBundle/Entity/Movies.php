<?php

namespace MovieListBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Movies
 *
 * @ORM\Table(name="movies")
 * @ORM\Entity(repositoryClass="MovieListBundle\Repository\MoviesRepository")
 */
class Movies
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="posterurl", type="string", length=255)
     */
    private $posterurl;

    /**
     * @var string
     *
     * @ORM\Column(name="starcast", type="string", length=255)
     */
    private $starcast;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=255)
     */
    private $language;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expirydate", type="date")
     */
    private $expirydate;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Movies
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Movies
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set posterurl
     *
     * @param string $posterurl
     *
     * @return Movies
     */
    public function setPosterurl($posterurl)
    {
        $this->posterurl = $posterurl;

        return $this;
    }

    /**
     * Get posterurl
     *
     * @return string
     */
    public function getPosterurl()
    {
        return $this->posterurl;
    }

    /**
     * Set starcast
     *
     * @param string $starcast
     *
     * @return Movies
     */
    public function setStarcast($starcast)
    {
        $this->starcast = $starcast;

        return $this;
    }

    /**
     * Get starcast
     *
     * @return string
     */
    public function getStarcast()
    {
        return $this->starcast;
    }

    /**
     * Set language
     *
     * @param string $language
     *
     * @return Movies
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set expirydate
     *
     * @param \DateTime $expirydate
     *
     * @return Movies
     */
    public function setExpirydate($expirydate)
    {
        $this->expirydate = $expirydate;

        return $this;
    }

    /**
     * Get expirydate
     *
     * @return \DateTime
     */
    public function getExpirydate()
    {
        return $this->expirydate;
    }
}
