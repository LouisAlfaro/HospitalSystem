<?php

namespace App\Repositories;

interface HospitalRepositoryInterface
{
    public function registrar(array $data);
    public function actualizar(int $id, array $data);
    public function eliminar(int $id);
    public function listar(array $filters = []);
    
}
