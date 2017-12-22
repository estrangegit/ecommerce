<?php

namespace Ecommerce\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Media
 *
 * @ORM\Table(name="media")
 * @ORM\Entity(repositoryClass="Ecommerce\EcommerceBundle\Repository\MediaRepository")
 */
class Media
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
     * @ORM\Column(name="file", type="string", length=255)
     *
     * @Assert\NotBlank(message="Merci de télécharger une image (jpg, png).")
     * @Assert\File(mimeTypes={"image/jpg", "image/jpeg", "image/png"})
     */
    private $file;

    /**
     * @var string
     */
    private $oldFile;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=125)
     */
    private $alt;


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
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return string
     */
    public function getOldFile()
    {
        return $this->oldFile;
    }

    /**
     * @param string $oldFile
     */
    public function setOldFile($oldFile)
    {
        $this->oldFile = $oldFile;
    }


    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return Media
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }
}
