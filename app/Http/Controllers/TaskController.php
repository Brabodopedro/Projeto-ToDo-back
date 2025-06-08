<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;

class TaskController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/tasks",
     *     summary="Listar tarefas do usuário autenticado",
     *     tags={"Tarefas"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de tarefas"
     *     )
     * )
     */
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->get();
        return response()->json($tasks);
    }

    /**
     * @OA\Post(
     *     path="/api/tasks",
     *     summary="Criar nova tarefa",
     *     tags={"Tarefas"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title"},
     *             @OA\Property(property="title", type="string", example="Estudar Swagger"),
     *             @OA\Property(property="description", type="string", example="Estudar como gerar documentação de APIs"),
     *             @OA\Property(property="due_date", type="string", format="date", example="2025-06-10"),
     *             @OA\Property(property="status", type="string", example="pendente")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Tarefa criada"
     *     )
     * )
     */
    public function store(TaskStoreRequest $request)
    {
        $task = Task::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status,
        ]);

        return response()->json($task, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/tasks/{id}",
     *     summary="Atualizar tarefa",
     *     tags={"Tarefas"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="title", type="string", example="Nova Tarefa"),
     *             @OA\Property(property="description", type="string", example="Descrição atualizada"),
     *             @OA\Property(property="due_date", type="string", format="date", example="2025-06-15"),
     *             @OA\Property(property="status", type="string", example="concluida")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Tarefa atualizada"
     *     )
     * )
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return response()->json(['error' => 'Acesso não autorizado'], 403);
        }

        $task->update($request->only(['title', 'description', 'due_date', 'status']));

        return response()->json($task);
    }

    /**
     * @OA\Delete(
     *     path="/api/tasks/{id}",
     *     summary="Excluir tarefa",
     *     tags={"Tarefas"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Tarefa deletada"
     *     )
     * )
     */
    public function destroy(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return response()->json(['error' => 'Acesso não autorizado'], 403);
        }

        $task->delete();

        return response()->json(['message' => 'Tarefa deletada com sucesso']);
    }
}
