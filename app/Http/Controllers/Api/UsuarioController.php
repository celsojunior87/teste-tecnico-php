<?php


namespace App\Http\Controllers\Api;

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

}
