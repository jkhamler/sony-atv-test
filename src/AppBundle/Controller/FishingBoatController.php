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
use Symfony\Component\HttpFoundation\Request;


class FishingBoatController extends Controller
{

    /**
     * @Route("/fishing-boat/calculate-power-requirements")
     */
    public function calculatePowerRequirementsAction(Request $request)
    {
        $fishingBoat = new FishingBoat();

        $form = $this->createFormBuilder($fishingBoat)
            ->add('hullLength', NumberType::class)
            ->add('buttockAngle', NumberType::class)
            ->add('displacement', NumberType::class)
            ->add('save', SubmitType::class, array('label' => 'Calculate Power Requirements'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var FishingBoat $fishingBoatModel */
            $fishingBoatModel = $form->getData();

            return $this->redirectToRoute('results', [
                'powerRequirement' => $fishingBoatModel->getPowerRequirement()
            ]);

        }

        return $this->render('fishing-boat/calculate-power-requirements.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/fishing-boat/show-results", Name="results")
     */
    public function showResultsAction(Request $request){

       $powerRequirement = $request->get('powerRequirement');

        return $this->render('fishing-boat/results.html.twig', [
            'powerRequirement' => $powerRequirement,
        ]);


    }



}