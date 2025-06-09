# Projeto ToDo - Backend (Laravel)

Este repositório contém a API do sistema de gerenciamento de tarefas desenvolvido com Laravel 10, MySQL e autenticação via JWT.

---

## ⚙️ Tecnologias e Ferramentas

- Laravel 10
- MySQL 8
- JWT Auth (tymon/jwt-auth)
- Swagger (l5-swagger)
- Docker + Docker Compose

---

## 🚀 Como Rodar com Docker

1. Clone este repositório e o front-end (`Projeto-ToDo-front`).
2. Vá até a raiz onde está o `docker-compose.yml`.
3. Execute:

```bash
docker compose up --build
```

4. Acesse a API: `http://localhost:8000/api`

---

## 🔐 Autenticação JWT

- **Rota de login**: `POST /api/login`
- **Rota protegida**: `GET /api/tasks` (necessário header `Authorization: Bearer TOKEN`)
- **Rota de registro**: `POST /api/register`

---

## 📚 Documentação da API

Acesse:  
```
http://localhost:8000/api/documentation
```

---

## 📂 Estrutura de Diretórios

- `app/Models`: Modelos Eloquent
- `app/Http/Controllers/Api`: Controladores da API
- `app/Http/Requests`: Validações com FormRequest
- `routes/api.php`: Definição das rotas da API

---

## 🧪 Testes com Postman

- Login
- Registro
- Listagem de tarefas
- Criação, edição, exclusão e alteração de status

---

## ✅ Funcionalidades

- Autenticação com JWT
- CRUD completo de tarefas
- Filtro por status (pendente, concluído, cancelado)
- Proteção de rotas via middleware
- Documentação Swagger

---

## 📄 Licença

MIT