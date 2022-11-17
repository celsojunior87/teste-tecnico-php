<?php


namespace App\Services;



use App\Http\Requests\UsuariosRequest;
use App\Interfaces\UsuariosInterface;
use App\Models\Usuarios;
use App\Traits\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            $usuarios->password = Hash::make($request->password);
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

    public function getArray()
    {
        $arr = [1, 10, 2, 3, 14, 8, 21];
        $newArray = implode($arr, ',');
        $arrNew = explode(',', $newArray);
        unset($newArray);

        echo in_array("14",$arr)?"possui o 14":"não possui o 14";

        $oldValue = 0;
        foreach($arrNew as $key => $value) {
            if ($value < $oldValue) {
                if (isset($arrNew[$key])) {
                    unset($arrNew[$key]);
                }
            }
            $oldValue = $value;
        }
        var_dump($arrNew);
        var_dump(count($arrNew));
    }
}
