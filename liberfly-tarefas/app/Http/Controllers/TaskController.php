<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/tarefas",
     *     summary="Lista as tarefas",
     *     @OA\Response(
     *         response=200,
     *         description="Retorna a lista de tarefas",
     *         @OA\JsonContent(
     *             type="array",
     *         )
     *     )
     * )
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    /**
     * @OA\Get(
     *     path="/api/tarefas/{id}",
     *     summary="Exibe uma tarefa específica",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID da tarefa",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Retorna os detalhes da tarefa",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tarefa não encontrada",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Tarefa não encontrada"
     *             )
     *         )
     *     )
     * )
     */
    public function show(string $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Tarefa não encontrada'], 404);
        }

        return response()->json($task);
    }

}
