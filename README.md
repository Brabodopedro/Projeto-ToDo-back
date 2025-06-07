# 📌 Task Manager API – Laravel 10 + JWT

Este projeto é uma API RESTful desenvolvida em Laravel 10 para gerenciamento de tarefas, com autenticação via JWT e integração com GitHub Actions para versionamento automático com `semantic-release`.

---

## ⚙️ Tecnologias

- [x] Laravel 10
- [x] JWT Authentication (`tymon/jwt-auth`)
- [x] MySQL
- [x] Form Requests (validação)
- [x] Eloquent ORM
- [x] Migrations, Seeders, Factories
- [x] GitHub Actions (CI/CD)
- [x] semantic-release
- [x] Swagger (OpenAPI – _em breve_)

---

## 📁 Funcionalidades

- Registro e login de usuários autenticados via JWT
- CRUD completo de tarefas:
  - Criar tarefa
  - Listar tarefas
  - Atualizar tarefa
  - Deletar tarefa
- Cada tarefa pertence a um único usuário
- Middleware de autenticação protege todas as rotas privadas

---

## 🚀 Instalação e execução local

### Pré-requisitos

- PHP 8.1+
- Composer
- MySQL
- Node.js (para semantic-release)
- Laravel CLI (opcional)

### 1. Clonar o projeto

```bash
git clone https://github.com/seu-usuario/task-manager-api.git
cd task-manager-api
```

### 2. Instalar dependências

```bash
composer install
npm install
```

### 3. Configurar ambiente

Copie o arquivo `.env.example`:

```bash
cp .env.example .env
```

Gere a chave da aplicação e a chave JWT:

```bash
php artisan key:generate
php artisan jwt:secret
```

### 4. Configurar banco de dados

No arquivo `.env`, edite:

```dotenv
DB_CONNECTION=mysql
DB_DATABASE=task_manager
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 5. Rodar as migrations

```bash
php artisan migrate
```

### 6. Iniciar o servidor

```bash
php artisan serve
```

A aplicação estará disponível em: [http://localhost:8000](http://localhost:8000)

---

## 🔐 Autenticação

### Registro

`POST /api/register`

```json
{
  "name": "Pedro",
  "email": "pedro@example.com",
  "password": "123456",
  "password_confirmation": "123456"
}
```

### Login

`POST /api/login`

```json
{
  "email": "pedro@example.com",
  "password": "123456"
}
```

Use o token retornado como **Bearer Token** nas rotas protegidas.

---

## 📦 Versionamento automático com semantic-release

Este projeto usa o `semantic-release` para:

- Analisar commits do tipo Conventional Commits
- Gerar automaticamente o `CHANGELOG.md`
- Criar versões (semver) e publicar releases no GitHub

### Exemplo de commit semantic:

```bash
git commit -m "feat: adiciona endpoint de criação de tarefa"
```

---

## 🐳 Docker (em breve)

Será possível rodar toda a aplicação usando `docker-compose`, incluindo:

- Laravel (PHP)
- MySQL
- phpMyAdmin

---

## 🔄 CI/CD com GitHub Actions

A cada push na branch `main`, o pipeline do GitHub Actions:

- Roda o `semantic-release`
- Gera um novo release
- Atualiza automaticamente `CHANGELOG.md`
- (Futuramente) Deploy automático com Docker

---

## 📄 Licença

Este projeto é open-source e licenciado sob a licença MIT.
