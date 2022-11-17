<?php


namespace App\Http\Controllers\Api;

use App\Http\Requests\UsuariosRequest;
use App\Interfaces\UsuariosInterface;

class UsuarioController
{
    public function __construct(UsuariosInterface $usuarios)
    {
        $this->usuarios = $usuarios;
    }

    /**
     * Visualizar todos os usuários
     *
     */
    public function getAll()
    {

        return $this->usuarios->getAll();
    }

    public function store(UsuariosRequest $request)
    {
        return $this->usuarios->store($request);
    }

    public function getArray()
    {
        return $this->usuarios->getArray();
    }

}
