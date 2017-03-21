<?php

namespace CodeDelivery\Http\Middleware;

use Closure;
use CodeDelivery\Repositories\UserRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


class OAuthCheckRole
{

    private $userRepository;

    function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
      public function handle($request, closure $next, $role) //aqui adicionamos um parametro para o middleware
      {

          $userId = Authorizer::getResourceOwnerId();
          $user   = $this->userRepository->find($userId);

          if ($user->role <> $role) { //se a role do usuário autenticado bate com a $role que passamos
                abort(403,'Access Forbiden');
          }

          return $next($request);
      }
}
