<?php

class UserController
{
    protected $model;
    public function __construct()
    {
    }
    public function list($request, $response, $args)
    {

        $response->getBody()->write('1');
        return $response;
    }
    public function create($request, $response, $args)
    {
        $user = $request->getParsedBody();
        $this->model->createUser($user);
       
    }
}
