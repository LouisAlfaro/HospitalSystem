<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HospitalRepositoryInterface;

class HospitalController extends Controller
{
    protected $hospitalRepo;

    public function __construct(HospitalRepositoryInterface $hospitalRepo)
    {
        $this->hospitalRepo = $hospitalRepo;
    }

    public function showCreateForm()
    {
        return view('hospitals.create');
    }

    public function registrar(Request $request)
    {
        $validatedData = $request->validate([
            'gerente'   => 'required|string',
            'condicion' => 'required|string',
            'sede'      => 'required|string',
            'distrito'  => 'required|string',
        ]);

        $this->hospitalRepo->registrar($validatedData);

        return redirect()->back()->with('success', 'Hospital registrado exitosamente.');
    }

    public function editForm(int $id)
    {
        
        $hospital = $this->hospitalRepo->getById($id);
        return view('hospitals.edit', compact('hospital'));
    }

    public function actualizar(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'gerente'   => 'required|string',
            'condicion' => 'required|string',
            'sede'      => 'required|string',
            'distrito'  => 'required|string',
        ]);

        $this->hospitalRepo->actualizar($id, $validatedData);

        return redirect()->back()->with('success', 'Hospital actualizado exitosamente.');
    }

    public function eliminar(int $id)
    {
        $this->hospitalRepo->eliminar($id);

        return redirect()->back()->with('success', 'Hospital eliminado exitosamente.');
    }

    public function listar(Request $request)
    {
        if ($request->has('id_busqueda') && !empty($request->input('id_busqueda'))) {
            $hospital = $this->hospitalRepo->getById($request->input('id_busqueda'));
            if ($hospital) {
                return redirect()->route('hospitals.edit', $hospital->id);
            } else {
                return redirect()->back()->with('error', 'No se encontró hospital con ese ID.');
            }
        }

        $filters = $request->only(['gerente', 'condicion', 'sede', 'distrito']);
        $hospitals = $this->hospitalRepo->listar($filters);

        if ($request->ajax()) {
            return response()->json($hospitals);
        }

        return view('hospitals.list', compact('hospitals'));
    }

    public function confirmDelete(int $id)
    {
        $hospital = $this->hospitalRepo->getById($id);
        return view('hospitals.delete', compact('hospital'));
    }
}
