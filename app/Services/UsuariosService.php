<?php


namespace App\Services;



use App\Http\Requests\UsuariosRequest;
use App\Interfaces\UsuariosInterface;
use App\Models\Cliente;
use App\Models\Usuarios;
use App\Traits\Response;
use Illuminate\Support\Facades\DB;

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

    public function store(UsuariosRequest $request)
    {
        DB::beginTransaction();
        try {
            $usuarios = new Usuarios();
            $usuarios->name = $request->name;
            $usuarios->name_login = $request->name_login;
            $usuarios->email = $request->email;
            $usuarios->zipcode = $request->zipcode;
            $usuarios->password = $request->password;
            $usuarios->save();

            DB::commit();
            return response()->json([
                'message' => 'Usuário criado com sucesso',
                'code' => 200,
                'error' => false,
                'results' => $usuarios
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
