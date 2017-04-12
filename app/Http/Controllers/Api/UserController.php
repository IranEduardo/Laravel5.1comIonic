<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Http\Controllers\Controller;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class UserController extends Controller
{

    protected $UserRepository;

    public function __construct(
          UserRepository $UserRepository)
    {
        $this->UserRepository      = $UserRepository;
    }


    public function authenticated()
    {
        $id = Authorizer::getResourceOwnerId();
        return $this->UserRepository->skipPresenter(false)->find($id);
    }

}
