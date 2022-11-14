<?php


namespace App\Services;



use App\Interfaces\UsuariosInterface;
use App\Models\Usuarios;
use App\Traits\Response;

class UsuariosService implements UsuariosInterface
{

    use Response;

    public function getAll()
    {
        try {
            $usuarios = Usuarios::all();
            return $this->success("Lista de Usuários", $usuarios);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
