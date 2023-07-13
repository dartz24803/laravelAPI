<?php

namespace App\Http\Controllers;

use App\ClienteModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return ('aaaaaaaaaaaaaaa');/*
        return DB::select('CALL listar_clientes()');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request['id'];
        $name = $request['name'];
        $dob = $request['dob'];
        $phone = $request['phone'];
        $email = $request['email'];
        $address = $request['address'];
        $payments = $request['payments'];
        $payments = json_encode($payments);

        $data = DB::select("CALL crear_cliente(?, ?, ?, ?, ?, ?, ?)", [$id, $name, $dob, $phone, $email, $address, $payments]);
        //return $payments;
        return response()->json(['message' => 'Cliente creado exitosamente']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function eliminar(Request $request, $clienteId)
    {
        try {
            $data = DB::select("CALL Eliminar(?)", [$clienteId]);
            // Puedes devolver una respuesta adecuada, como un mensaje de éxito o redireccionar a otra página
            return response()->json(['message' => 'Cliente eliminado correctamente']);
        } catch (Exception $e) {
            // Captura la excepción y devuelve una respuesta con el mensaje de error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function eliminarpago(Request $request, $COD)
    {
        try {
            $data = DB::select("CALL eliminar_pago(?)", [$COD]);
            // Puedes devolver una respuesta adecuada, como un mensaje de éxito o redireccionar a otra página
            return response()->json(['message' => 'Cliente eliminado correctamente']);
        } catch (Exception $e) {
            // Captura la excepción y devuelve una respuesta con el mensaje de error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function buscar(Request $request, $clienteId)
    {
        try {
            $data = DB::select("CALL buscar_cliente(?)", [$clienteId]);
            // Puedes devolver una respuesta adecuada, como un mensaje de éxito o redireccionar a otra página
            if (count($data) > 0) {
                $data[0]->payments = json_decode($data[0]->payments);
            }
            return $data;
        } catch (Exception $e) {
            // Captura la excepción y devuelve una respuesta con el mensaje de error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function buscarMonto(Request $request, $clienteId)
    {
        try {
            $data = DB::select("CALL buscarmonto(?)", [$clienteId]);
            // Puedes devolver una respuesta adecuada, como un mensaje de éxito o redireccionar a otra página
            return $data;
        } catch (Exception $e) {
            // Captura la excepción y devuelve una respuesta con el mensaje de error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
