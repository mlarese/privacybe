<?php
/**
 * Created by PhpStorm.
 * User: Courage
 * Date: 12/06/2018
 * Time: 14:26
 */

namespace App\Entity\Config;

use Doctrine\ORM\Mapping as ORM;

class Country
{
    /**
     * @return mixed
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @param mixed $countryId
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="country_id", type="integer")
     */
    protected $countryId;
    /**
     * @ORM\Column(type="string", length=200, nullable=false)
     */
    protected $country;

}