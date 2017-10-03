<?php
/**
 * Created by PhpStorm.
 * User: jonathanhamler
 * Date: 03/10/2017
 * Time: 14:25
 */

namespace AppBundle\Controller;

use AppBundle\Model\FishingBoat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class FishingBoatController extends Controller
{

    /**
     * @Route("/fishing-boat/dashboard")
     */
    public function dashboardAction()
    {

        $fishingBoat = new FishingBoat();

        $form = $this->createFormBuilder($fishingBoat)
            ->add('hullLength', NumberType::class)
            ->add('buttockAngle', NumberType::class)
            ->add('displacement', NumberType::class)
            ->add('save', SubmitType::class, array('label' => 'Calculate Power Requirements'))
            ->getForm();


        return $this->render('fishing-boat/dashboard.html.twig', [
            'form' => $form->createView()
        ]);

    }

}