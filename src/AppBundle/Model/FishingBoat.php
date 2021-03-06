<?php
/**
 * Created by PhpStorm.
 * User: jonathanhamler
 * Date: 03/10/2017
 * Time: 14:50
 */

namespace AppBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;


/**
 * This is the 'Fishing Boat' model which contains the relevant attribute and the logic
 * for calculating the subsequent power requirement in horsepower.
 *
 *
 * Class FishingBoat
 * @package AppBundle\Model
 */
class FishingBoat
{
    protected $hullLength;
    /**
     * Validation rule to ensure that the input range is adhered to.
     *
     * @Assert\Range(
     *      min = 2,
     *      max = 7,
     *      minMessage = "The minimum buttock angle is {{ limit }} degrees",
     *      maxMessage = "The maximum buttock angle is {{ limit }} degrees"
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
     * @return float
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