<?php

namespace CoreBundle\Entity\Information;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ratings
 *
 * @ORM\Table(name="information_ratings")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\Information\RatingsRepository")
 */
class Ratings
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
     * @var int
     *
     * @ORM\Column(name="Rating", type="integer")
     */
    private $rating;

    /**
    *@var int
    *
    *@ORM\ManyToMany(targetEntity="CoreBundle\Entity\User\User", cascade={"persist"})
    *
    */
    private $Users;


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
     * Set rating
     *
     * @param integer $rating
     *
     * @return Ratings
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return int
     */
    public function getRating()
    {
        return $this->rating;
    }
}

