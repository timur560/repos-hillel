<?php


namespace App\Controller;


class UsersController
{
    public int $a;

    /**
     * @Route("/users/show")
     */
    public function showAction()
    {
        echo 'Show user info';
    }
}