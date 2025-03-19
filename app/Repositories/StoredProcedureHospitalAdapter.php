<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class StoredProcedureHospitalAdapter implements HospitalRepositoryInterface
{
    public function registrar(array $data)
    {
        return DB::select('CALL hospital_registrar(?, ?, ?, ?)', [
            $data['gerente'] ?? null,
            $data['condicion'] ?? null,
            $data['sede'] ?? null,
            $data['distrito'] ?? null,
        ]);
    }

    public function actualizar(int $id, array $data)
    {
        return DB::select('CALL hospital_actualizar(?, ?, ?, ?, ?)', [
            $id,
            $data['gerente'] ?? null,
            $data['condicion'] ?? null,
            $data['sede'] ?? null,
            $data['distrito'] ?? null,
        ]);
    }

    public function eliminar(int $id)
    {
        return DB::select('CALL hospital_eliminar(?)', [$id]);
    }

    public function listar(array $filters = [])
    {
        
        $gerente   = $filters['gerente']   ?? null;
        $condicion = $filters['condicion'] ?? null;
        $sede      = $filters['sede']      ?? null;
        $distrito  = $filters['distrito']  ?? null;

        return DB::select('CALL hospital_listar(?, ?, ?, ?)', [
            $gerente,
            $condicion,
            $sede,
            $distrito,
        ]);
    }

}
