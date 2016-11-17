<?php

namespace CodeDelivery\Services;

use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;

class ClientService {

    protected $clientRepository;
    protected $userRepository;

    public function __construct(ClientRepository $clientRepository, UserRepository $userRepository)
    {
         $this->clientRepository = $clientRepository;
         $this->userRepository =   $userRepository;
    }

    public function create($dados)
    {
        $dados['user']['password'] = bcrypt('123456');
        $user =  $this->userRepository->create($dados['user']);
        $dados['user_id'] = $user->id;
        $client = $this->clientRepository->create($dados);
    }
    public function update($dados, $id)
    {
        $client =  $this->clientRepository->find($id);
        $client->user->update($dados['user']);
        $client->update($dados);
    }


 }