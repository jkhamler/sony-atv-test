<?php
/**
 * Created by PhpStorm.
 * User: jonathanhamler
 * Date: 03/10/2017
 * Time: 14:50
 */

namespace AppBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;


class FishingBoat
{
    protected $hullLength;
    /**
     * @Assert\Range(
     *      min = 2,
     *      max = 7,
     *      minMessage = "The minimum buttock angle is {{ limit }",
     *      maxMessage = "The maximum buttock angle is {{ limit }}"
     * )
     */
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
     * Calculates the SL ratio
     *
     * @return float
     */
    public function calculateSLRatio()
    {
        return ($this->getButtockAngle() * -0.2) + 2.9;
    }

    /**
     * Calculates the Power Requirement in Horsepower for the ship
     *
     * @return int
     */
    public function getPowerRequirement()
    {
        $hullLength = $this->getHullLength();
        $displacement = $this->getDisplacement();
        $knots = $this->getHullSpeedKnots();

        $cw = 0.8 + (0.17 * $this->calculateSLRatio());

        $powerRequirement = ($displacement / 1000) * ($knots / ($cw * $hullLength ^ 0.5)) ^ 3;

        return $powerRequirement;
    }

    /**
     * Calculates the hull speed in knots
     *
     * @return float
     */
    public function getHullSpeedKnots()
    {
        $slRatio = $this->calculateSLRatio();

        return $slRatio * ($this->getHullLength() ^ 0.5);
    }


}