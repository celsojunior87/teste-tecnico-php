<?php


namespace App\Interfaces;


use App\Http\Requests\UsuariosRequest;

interface UsuariosInterface
{

    /**
     * Get all Usuários
     *
     * @method  GET api/usuarios
     * @access  public
     */
    public function getAll();

    /**
     * Persiste os dados do usuario no banco de dados
     * @method  POST api/usuarios
     * @param UsuariosRequest $request
     * @return mixed
     */
    public function store(UsuariosRequest $request);

    public function getArray();
}
