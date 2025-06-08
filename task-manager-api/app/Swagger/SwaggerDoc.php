<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         version="1.0.0",
 *         title="Task Manager API",
 *         description="Documentação da API do sistema de tarefas"
 *     ),
 *     @OA\Server(
 *         url=L5_SWAGGER_CONST_HOST,
 *         description="API local"
 *     )
 * )
 */
class SwaggerDoc {}
