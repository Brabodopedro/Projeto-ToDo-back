# Task Manager API (Laravel 10 + JWT)

API para gerenciamento de tarefas com autenticação JWT, documentação Swagger e integração com front-end React.

## 🔧 Tecnologias

- Laravel 10
- MySQL
- JWT Auth (`tymon/jwt-auth`)
- L5 Swagger
- Docker (opcional)
- GitHub Actions + semantic-release (CI/CD)

---

## 📂 Estrutura de Diretórios

- `app/Http/Controllers`: Controladores (AuthController, TaskController)
- `app/Http/Requests`: Validação (LoginRequest, RegisterRequest, TaskStoreRequest, TaskUpdateRequest)
- `app/Models`: Modelos (User, Task)
- `routes/api.php`: Rotas da API
- `docs`: Documentação gerada pelo Swagger

---

## 🔐 Autenticação

Autenticação via JWT. Após login, um token é retornado e deve ser usado no header:

```http
Authorization: Bearer {token}
```

---

## 🔁 Rotas da API

| Método | Endpoint         | Middleware     | Descrição                    |
|--------|------------------|----------------|------------------------------|
| POST   | `/api/register`  | guest          | Cadastro de usuário          |
| POST   | `/api/login`     | guest          | Login e retorno de token     |
| GET    | `/api/me`        | auth:api       | Retorna usuário autenticado  |
| POST   | `/api/logout`    | auth:api       | Logout                       |
| GET    | `/api/tasks`     | auth:api       | Listar tarefas do usuário    |
| POST   | `/api/tasks`     | auth:api       | Criar nova tarefa            |
| PUT    | `/api/tasks/{id}`| auth:api       | Atualizar tarefa             |
| DELETE | `/api/tasks/{id}`| auth:api       | Excluir tarefa               |

---

## 🧪 Testando com Postman

1. Registrar: `POST /api/register`
2. Login: `POST /api/login`
3. Copiar token do response e usar como `Bearer Token`
4. Testar rotas protegidas com o token.

---

## 📄 Documentação Swagger

Acesse em:  
```
http://localhost:8000/api/documentation
```

Comando para regenerar:
```bash
php artisan l5-swagger:generate
```

---

## 🚀 CI/CD

- Automatizado com GitHub Actions.
- Versionamento com `semantic-release`.
- Publicação ocorre a cada merge na branch `main`.

---

## 🗃️ Banco de Dados

Tabela `users`:
- id
- name
- email
- password

Tabela `tasks`:
- id
- user_id
- title
- description
- due_date
- status

---

## 📦 Instalação

```bash
git clone https://github.com/seu-usuario/task-manager-api.git
cd task-manager-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

---

## 📌 Observações

- Todas as requisições protegidas requerem token JWT.
- Uso de `FormRequest` para validação.
- Documentação atualizada automaticamente com o Swagger.