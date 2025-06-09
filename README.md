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

## 🚀 COMO RODAR O PROJETO COM DOCKER

> ⚠️ IMPORTANTE: Este repositório assume que o arquivo `docker-compose.yml` está dentro da pasta `Projeto-ToDo-back`.

1. Clone **este repositório** e o front-end (`https://github.com/Brabodopedro/Projeto-ToDo-front`) lado a lado na mesma estrutura:

```
alguma-pasta/
├── Projeto-ToDo-back/         <- Este repositório (com o docker-compose.yml dentro)
├── Projeto-ToDo-front/        <- Repositório do front-end (clone separado)
```

2. Navegue até a pasta `Projeto-ToDo-back`:
```bash
cd Projeto-ToDo-back
```

3. Execute:
```bash
docker compose up --build
```

4. Acesse:
- API Laravel: [http://localhost:8000/api](http://localhost:8000/api)
- Frontend React: [http://localhost:3000](http://localhost:3000)

---

## 🔐 Autenticação JWT

- `POST /api/login`
- `GET /api/tasks` (requer `Authorization: Bearer TOKEN`)
- `POST /api/register`

---

## 📚 Documentação da API

[http://localhost:8000/api/documentation](http://localhost:8000/api/documentation)

---

## ✅ Funcionalidades

- Autenticação JWT
- CRUD de tarefas com status (pendente, concluído, cancelado)
- Middleware de proteção
- Documentação Swagger