<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        return "API de Aplicación de Control de Tareas";
    }

    public function create(Request $request)
    {
        $request->validate([
            'tarea' => 'required|max:20|min:3'
        ]);
        Task::create([
            'tarea' => $request->tarea,
            'descripcion' => $request->descripcion
        ]);
        return response()->json(['mensaje' => 'La tarea fue agregada exitosamente']);
    }

    public function all(Request $request)
    {
        $tasks = Task::all();

        return response()->json(['tarea' => $tasks]);
    }

    public function getTask(Request $request, int $id)
    {
        $task = Task::find($id);
        if (is_null($task)) {
            return response()->json('Datos no encontrados', 404);
        }
        return response()->json($task);
    }

    public function edit(Request $request, int $id)
    {
        $task = Task::find($id);
        if (is_null($task)) {
            return response()->json('Datos no encontrados', 404);
        }
        $validate = $request->validate([
            'tarea' => 'required|max:20'
        ]);
        $task->tarea = $request->tarea;
        $task->descripcion = $request->descripcion;
        $task->save();
        return response()->json(['Tarea modificada exitosamente.']);
    }

    public function completed(Request $request, $id)
    {
        $task = Task::find($id);
        if (is_null($task)) {
            return response()->json('Datos no encontrados', 404);
        }
        $task->completa =1;
        $task->save();
        return response()->json(['Tarea marcada como Completa']);
    }

    public function delete(Request $request, $id)
    {
        $task = Task::find($id);
        if (is_null($task)) {
            return response()->json('Datos no encontrados', 404);
        }
        $task->delete();
        return response()->json(['Tarea eliminada correctamente.']);
    }

}
