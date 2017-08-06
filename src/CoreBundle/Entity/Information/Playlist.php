<?php

namespace CoreBundle\Entity\Information;

use Doctrine\ORM\Mapping as ORM;

/**
 * Playlist
 *
 * @ORM\Table(name="information_playlist")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\Information\PlaylistRepository")
 */
class Playlist
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
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var bool
     * @ORM\Column(name="IsPublic", type="boolean")
     */
    private $isPublic = false;


    /**
    *
    *@ORM\ManyToOne( targetEntity="CoreBundle\Entity\User\User", inversedBy="Playlists")
    *@ORM\JoinColumn( name="idUser" , referencedColumnName="id" )
    */
    private $CreatorId;

    /**
    *@ORM\ManyToMany( targetEntity = "CoreBundle\Entity\User\User" )
    */
    private $Users;

    /**
    *@ORM\ManyToMany( targetEntity = "Ratings", cascade={"persist"})
    */
    private $ratings;


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
     * @return Playlist
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
     * Set isPublic
     *
     * @param boolean $isPublic
     *
     * @return Playlist
     */
    public function setIsPublic($isPublic)
    {
        $this->isPublic = $isPublic;

        return $this;
    }

    /**
     * Get isPublic
     *
     * @return bool
     */
    public function getIsPublic()
    {
        return $this->isPublic;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set creatorId
     *
     * @param \CoreBundle\Entity\Information\User $creatorId
     *
     * @return Playlist
     */
    public function setCreatorId(\CoreBundle\Entity\Information\User $creatorId = null)
    {
        $this->CreatorId = $creatorId;

        return $this;
    }

    /**
     * Get creatorId
     *
     * @return \CoreBundle\Entity\Information\User
     */
    public function getCreatorId()
    {
        return $this->CreatorId;
    }

    /**
     * Add user
     *
     * @param \CoreBundle\Entity\Information\User $user
     *
     * @return Playlist
     */
    public function addUser(\CoreBundle\Entity\Information\User $user)
    {
        $this->Users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \CoreBundle\Entity\Information\User $user
     */
    public function removeUser(\CoreBundle\Entity\Information\User $user)
    {
        $this->Users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->Users;
    }
}
