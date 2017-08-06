<?php

namespace CoreBundle\Entity\Music;

use Doctrine\ORM\Mapping as ORM;

/**
 * Track
 *
 * @ORM\Table(name="music_track")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\Music\TrackRepository")
 */
class Track
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
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ReleaseDate", type="datetime", nullable=true)
     */
    private $releaseDate;

    /**
     * @var int
     *
     * @ORM\Column(name="Duration", type="integer", nullable=true)
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="FileLocation", type="text", nullable=true, unique=false)
     */
    private $fileLocation;

    /**
    *@ORM\ManyToMany(targetEntity="Album", cascafe={"persist"})
    */
    private $albums;

    /**
    *@ORM\ManyToMany(targetEntity="Mood", cascade={"persist"})
    */
    private $moods;

    /**
    *@ORM\ManyToMany(targetEntity="Genre", cascade={"persist"})
    */
    private $Genres;

    /**
    *@ORM\ManyToMAny(targetEntity="Artist", cascade={"persist"})
    */
    private $Artists;

    /**
    *@ORM\ManyToOne(targetEntity="Artwork", inversedBy="Tracks")
    *@ORM\JoinColumn( name="artowokId" , referencedColumnName="id" )
    */
    private $artworkId;


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
     * @return Track
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
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     *
     * @return Track
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \DateTime
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return Track
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set fileLocation
     *
     * @param string $fileLocation
     *
     * @return Track
     */
    public function setFileLocation($fileLocation)
    {
        $this->fileLocation = $fileLocation;

        return $this;
    }

    /**
     * Get fileLocation
     *
     * @return string
     */
    public function getFileLocation()
    {
        return $this->fileLocation;
    }
}

