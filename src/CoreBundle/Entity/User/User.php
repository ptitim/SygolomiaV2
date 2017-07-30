<?php

namespace CoreBundle\Entity\User;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table(name="user_user")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\User\UserRepository")
 */
 class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
    *@ORM\OneToMany( targetEntity="CoreBundle\Entity\Information\Playlist", mappedBy="CreatorId" )
    */
    protected $PlaylistsCreated;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    public function __construct()
    {
        parent::__construct();
        $this->Playlist = new ArrayCollection();
        // your own logic
    }

    /**
     * Add playlistsCreated
     *
     * @param \CoreBundle\Entity\User\Playlist $playlistsCreated
     *
     * @return User
     */
    public function addPlaylistsCreated(\CoreBundle\Entity\User\Playlist $playlistsCreated)
    {
        $this->PlaylistsCreated[] = $playlistsCreated;

        return $this;
    }

    /**
     * Remove playlistsCreated
     *
     * @param \CoreBundle\Entity\User\Playlist $playlistsCreated
     */
    public function removePlaylistsCreated(\CoreBundle\Entity\User\Playlist $playlistsCreated)
    {
        $this->PlaylistsCreated->removeElement($playlistsCreated);
    }

    /**
     * Get playlistsCreated
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlaylistsCreated()
    {
        return $this->PlaylistsCreated;
    }

    /**
     * Add playlist
     *
     * @param \CoreBundle\Entity\User\Playlist $playlist
     *
     * @return User
     */
    public function addPlaylist(\CoreBundle\Entity\User\Playlist $playlist)
    {
        $this->Playlists[] = $playlist;

        return $this;
    }

    /**
     * Remove playlist
     *
     * @param \CoreBundle\Entity\User\Playlist $playlist
     */
    public function removePlaylist(\CoreBundle\Entity\User\Playlist $playlist)
    {
        $this->Playlists->removeElement($playlist);
    }

    /**
     * Get playlists
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlaylists()
    {
        return $this->Playlists;
    }
}
