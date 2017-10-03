<?php
/**
 * Created by PhpStorm.
 * User: jonathanhamler
 * Date: 03/10/2017
 * Time: 14:50
 */

namespace AppBundle\Model;


class FishingBoat
{
    protected $hullLength;
    protected $buttockAngle;
    protected $displacement;

    /**
     * @return mixed
     */
    public function getHullLength()
    {
        return $this->hullLength;
    }

    /**
     * @param mixed $hullLength
     */
    public function setHullLength($hullLength)
    {
        $this->hullLength = $hullLength;
    }

    /**
     * @return mixed
     */
    public function getButtockAngle()
    {
        return $this->buttockAngle;
    }

    /**
     * @param mixed $buttockAngle
     */
    public function setButtockAngle($buttockAngle)
    {
        $this->buttockAngle = $buttockAngle;
    }

    /**
     * @return mixed
     */
    public function getDisplacement()
    {
        return $this->displacement;
    }

    /**
     * @param mixed $displacement
     */
    public function setDisplacement($displacement)
    {
        $this->displacement = $displacement;
    }

    /**
     * @return int
     */
    public function getPowerRequirement(){
        return 250;
    }


}