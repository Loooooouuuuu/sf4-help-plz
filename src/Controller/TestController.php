<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\TestType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\TestParent;

class TestController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request)
    {
        $TestParent = $this->getDoctrine()->getRepository(TestParent::class)->find(1);
        $form = $this->createFormBuilder($TestParent)
            ->add('test', TestType::class)
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            die('ok');
        }
        return $this->render('test/index.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'TestController',
        ]);
    }
}
