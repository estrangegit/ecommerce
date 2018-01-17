<?php

namespace Utilisateurs\UtilisateursBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Villes
 *
 * @ORM\Table(name="villes", uniqueConstraints={@ORM\UniqueConstraint(name="ville_code_commune_2", columns={"ville_code_commune"}), @ORM\UniqueConstraint(name="ville_slug", columns={"ville_slug"})}, indexes={@ORM\Index(name="ville_departement", columns={"ville_departement"}), @ORM\Index(name="ville_nom", columns={"ville_nom"}), @ORM\Index(name="ville_nom_reel", columns={"ville_nom_reel"}), @ORM\Index(name="ville_code_commune", columns={"ville_code_commune"}), @ORM\Index(name="ville_code_postal", columns={"ville_code_postal"}), @ORM\Index(name="ville_longitude_latitude_deg", columns={"ville_longitude_deg", "ville_latitude_deg"}), @ORM\Index(name="ville_nom_soundex", columns={"ville_nom_soundex"}), @ORM\Index(name="ville_nom_metaphone", columns={"ville_nom_metaphone"}), @ORM\Index(name="ville_population_2010", columns={"ville_population_2010"}), @ORM\Index(name="ville_nom_simple", columns={"ville_nom_simple"})})
 * @ORM\Entity
 */
class Villes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ville_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $villeId;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_departement", type="string", length=3, nullable=true)
     */
    private $villeDepartement;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_slug", type="string", length=255, nullable=true)
     */
    private $villeSlug;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_nom", type="string", length=45, nullable=true)
     */
    private $villeNom;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_nom_simple", type="string", length=45, nullable=true)
     */
    private $villeNomSimple;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_nom_reel", type="string", length=45, nullable=true)
     */
    private $villeNomReel;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_nom_soundex", type="string", length=20, nullable=true)
     */
    private $villeNomSoundex;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_nom_metaphone", type="string", length=22, nullable=true)
     */
    private $villeNomMetaphone;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_code_postal", type="string", length=255, nullable=true)
     */
    private $villeCodePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_commune", type="string", length=3, nullable=true)
     */
    private $villeCommune;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_code_commune", type="string", length=5, nullable=false)
     */
    private $villeCodeCommune;

    /**
     * @var integer
     *
     * @ORM\Column(name="ville_arrondissement", type="smallint", nullable=true)
     */
    private $villeArrondissement;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_canton", type="string", length=4, nullable=true)
     */
    private $villeCanton;

    /**
     * @var integer
     *
     * @ORM\Column(name="ville_amdi", type="smallint", nullable=true)
     */
    private $villeAmdi;

    /**
     * @var integer
     *
     * @ORM\Column(name="ville_population_2010", type="integer", nullable=true)
     */
    private $villePopulation2010;

    /**
     * @var integer
     *
     * @ORM\Column(name="ville_population_1999", type="integer", nullable=true)
     */
    private $villePopulation1999;

    /**
     * @var integer
     *
     * @ORM\Column(name="ville_population_2012", type="integer", nullable=true)
     */
    private $villePopulation2012;

    /**
     * @var integer
     *
     * @ORM\Column(name="ville_densite_2010", type="integer", nullable=true)
     */
    private $villeDensite2010;

    /**
     * @var float
     *
     * @ORM\Column(name="ville_surface", type="float", precision=10, scale=0, nullable=true)
     */
    private $villeSurface;

    /**
     * @var float
     *
     * @ORM\Column(name="ville_longitude_deg", type="float", precision=10, scale=0, nullable=true)
     */
    private $villeLongitudeDeg;

    /**
     * @var float
     *
     * @ORM\Column(name="ville_latitude_deg", type="float", precision=10, scale=0, nullable=true)
     */
    private $villeLatitudeDeg;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_longitude_grd", type="string", length=9, nullable=true)
     */
    private $villeLongitudeGrd;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_latitude_grd", type="string", length=8, nullable=true)
     */
    private $villeLatitudeGrd;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_longitude_dms", type="string", length=9, nullable=true)
     */
    private $villeLongitudeDms;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_latitude_dms", type="string", length=8, nullable=true)
     */
    private $villeLatitudeDms;

    /**
     * @var integer
     *
     * @ORM\Column(name="ville_zmin", type="integer", nullable=true)
     */
    private $villeZmin;

    /**
     * @var integer
     *
     * @ORM\Column(name="ville_zmax", type="integer", nullable=true)
     */
    private $villeZmax;

    /**
     * @return int
     */
    public function getVilleId()
    {
        return $this->villeId;
    }

    /**
     * @return string
     */
    public function getVilleDepartement()
    {
        return $this->villeDepartement;
    }

    /**
     * @param string $villeDepartement
     */
    public function setVilleDepartement($villeDepartement)
    {
        $this->villeDepartement = $villeDepartement;
    }

    /**
     * @return string
     */
    public function getVilleSlug()
    {
        return $this->villeSlug;
    }

    /**
     * @param string $villeSlug
     */
    public function setVilleSlug($villeSlug)
    {
        $this->villeSlug = $villeSlug;
    }

    /**
     * @return string
     */
    public function getVilleNom()
    {
        return $this->villeNom;
    }

    /**
     * @param string $villeNom
     */
    public function setVilleNom($villeNom)
    {
        $this->villeNom = $villeNom;
    }

    /**
     * @return string
     */
    public function getVilleNomSimple()
    {
        return $this->villeNomSimple;
    }

    /**
     * @param string $villeNomSimple
     */
    public function setVilleNomSimple($villeNomSimple)
    {
        $this->villeNomSimple = $villeNomSimple;
    }

    /**
     * @return string
     */
    public function getVilleNomReel()
    {
        return $this->villeNomReel;
    }

    /**
     * @param string $villeNomReel
     */
    public function setVilleNomReel($villeNomReel)
    {
        $this->villeNomReel = $villeNomReel;
    }

    /**
     * @return string
     */
    public function getVilleNomSoundex()
    {
        return $this->villeNomSoundex;
    }

    /**
     * @param string $villeNomSoundex
     */
    public function setVilleNomSoundex($villeNomSoundex)
    {
        $this->villeNomSoundex = $villeNomSoundex;
    }

    /**
     * @return string
     */
    public function getVilleNomMetaphone()
    {
        return $this->villeNomMetaphone;
    }

    /**
     * @param string $villeNomMetaphone
     */
    public function setVilleNomMetaphone($villeNomMetaphone)
    {
        $this->villeNomMetaphone = $villeNomMetaphone;
    }

    /**
     * @return string
     */
    public function getVilleCodePostal()
    {
        return $this->villeCodePostal;
    }

    /**
     * @param string $villeCodePostal
     */
    public function setVilleCodePostal($villeCodePostal)
    {
        $this->villeCodePostal = $villeCodePostal;
    }

    /**
     * @return string
     */
    public function getVilleCommune()
    {
        return $this->villeCommune;
    }

    /**
     * @param string $villeCommune
     */
    public function setVilleCommune($villeCommune)
    {
        $this->villeCommune = $villeCommune;
    }

    /**
     * @return string
     */
    public function getVilleCodeCommune()
    {
        return $this->villeCodeCommune;
    }

    /**
     * @param string $villeCodeCommune
     */
    public function setVilleCodeCommune($villeCodeCommune)
    {
        $this->villeCodeCommune = $villeCodeCommune;
    }

    /**
     * @return int
     */
    public function getVilleArrondissement()
    {
        return $this->villeArrondissement;
    }

    /**
     * @param int $villeArrondissement
     */
    public function setVilleArrondissement($villeArrondissement)
    {
        $this->villeArrondissement = $villeArrondissement;
    }

    /**
     * @return string
     */
    public function getVilleCanton()
    {
        return $this->villeCanton;
    }

    /**
     * @param string $villeCanton
     */
    public function setVilleCanton($villeCanton)
    {
        $this->villeCanton = $villeCanton;
    }

    /**
     * @return int
     */
    public function getVilleAmdi()
    {
        return $this->villeAmdi;
    }

    /**
     * @param int $villeAmdi
     */
    public function setVilleAmdi($villeAmdi)
    {
        $this->villeAmdi = $villeAmdi;
    }

    /**
     * @return int
     */
    public function getVillePopulation2010()
    {
        return $this->villePopulation2010;
    }

    /**
     * @param int $villePopulation2010
     */
    public function setVillePopulation2010($villePopulation2010)
    {
        $this->villePopulation2010 = $villePopulation2010;
    }

    /**
     * @return int
     */
    public function getVillePopulation1999()
    {
        return $this->villePopulation1999;
    }

    /**
     * @param int $villePopulation1999
     */
    public function setVillePopulation1999($villePopulation1999)
    {
        $this->villePopulation1999 = $villePopulation1999;
    }

    /**
     * @return int
     */
    public function getVillePopulation2012()
    {
        return $this->villePopulation2012;
    }

    /**
     * @param int $villePopulation2012
     */
    public function setVillePopulation2012($villePopulation2012)
    {
        $this->villePopulation2012 = $villePopulation2012;
    }

    /**
     * @return int
     */
    public function getVilleDensite2010()
    {
        return $this->villeDensite2010;
    }

    /**
     * @param int $villeDensite2010
     */
    public function setVilleDensite2010($villeDensite2010)
    {
        $this->villeDensite2010 = $villeDensite2010;
    }

    /**
     * @return float
     */
    public function getVilleSurface()
    {
        return $this->villeSurface;
    }

    /**
     * @param float $villeSurface
     */
    public function setVilleSurface($villeSurface)
    {
        $this->villeSurface = $villeSurface;
    }

    /**
     * @return float
     */
    public function getVilleLongitudeDeg()
    {
        return $this->villeLongitudeDeg;
    }

    /**
     * @param float $villeLongitudeDeg
     */
    public function setVilleLongitudeDeg($villeLongitudeDeg)
    {
        $this->villeLongitudeDeg = $villeLongitudeDeg;
    }

    /**
     * @return float
     */
    public function getVilleLatitudeDeg()
    {
        return $this->villeLatitudeDeg;
    }

    /**
     * @param float $villeLatitudeDeg
     */
    public function setVilleLatitudeDeg($villeLatitudeDeg)
    {
        $this->villeLatitudeDeg = $villeLatitudeDeg;
    }

    /**
     * @return string
     */
    public function getVilleLongitudeGrd()
    {
        return $this->villeLongitudeGrd;
    }

    /**
     * @param string $villeLongitudeGrd
     */
    public function setVilleLongitudeGrd($villeLongitudeGrd)
    {
        $this->villeLongitudeGrd = $villeLongitudeGrd;
    }

    /**
     * @return string
     */
    public function getVilleLatitudeGrd()
    {
        return $this->villeLatitudeGrd;
    }

    /**
     * @param string $villeLatitudeGrd
     */
    public function setVilleLatitudeGrd($villeLatitudeGrd)
    {
        $this->villeLatitudeGrd = $villeLatitudeGrd;
    }

    /**
     * @return string
     */
    public function getVilleLongitudeDms()
    {
        return $this->villeLongitudeDms;
    }

    /**
     * @param string $villeLongitudeDms
     */
    public function setVilleLongitudeDms($villeLongitudeDms)
    {
        $this->villeLongitudeDms = $villeLongitudeDms;
    }

    /**
     * @return string
     */
    public function getVilleLatitudeDms()
    {
        return $this->villeLatitudeDms;
    }

    /**
     * @param string $villeLatitudeDms
     */
    public function setVilleLatitudeDms($villeLatitudeDms)
    {
        $this->villeLatitudeDms = $villeLatitudeDms;
    }

    /**
     * @return int
     */
    public function getVilleZmin()
    {
        return $this->villeZmin;
    }

    /**
     * @param int $villeZmin
     */
    public function setVilleZmin($villeZmin)
    {
        $this->villeZmin = $villeZmin;
    }

    /**
     * @return int
     */
    public function getVilleZmax()
    {
        return $this->villeZmax;
    }

    /**
     * @param int $villeZmax
     */
    public function setVilleZmax($villeZmax)
    {
        $this->villeZmax = $villeZmax;
    }
}

