<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class AdminUtilityController extends AbstractController
{

    /**
     * @Route("/admin/utility/users", methods="GET", name="admin_utility_users")
     */
    public function getUsersApi(UserRepository $userRepository, Request $request){
        $users = $userRepository->findAllMatching($request->query->get('query'));

        return $this->json([
            'users' => $users
        ], 200, [], ['groups' =>['userapi']]);
    }
}
