# API de Planos de Férias
Esta é uma API RESTful desenvolvida em Laravel 11 para gerenciar planos de férias para o ano de 2024. A API permite criar, ler, atualizar e excluir planos de férias, bem como gerar documentos PDF com detalhes dos planos.

## Funcionalidades
- **CRUD de Planos de Férias:** Crie, leia, atualize e exclua planos de férias.
- **Geração de PDFs:** Gere um documento PDF contendo os detalhes de um plano de férias.
- **Autenticação:** Utilize JWT para autenticação e proteção dos endpoints da API.
## Documentação da API
A documentação completa da API está disponível em [Postman](https://documenter.getpostman.com/view/23405156/2sA3s3GBAF). Esta documentação inclui detalhes sobre todos os endpoints disponíveis, parâmetros necessários e exemplos de requisições e respostas.

## Endpoints da API
### 1. Login
- **Método:** POST

- **Endpoint:** `/api/login`

- **Parâmetros:**

    - `email` (string, obrigatório): O e-mail do usuário.
    - `password` (string, obrigatório): A senha do usuário.
- **Resposta de Sucesso:**

    - **Código:** 200 OK
    - **Corpo:**
    ```json
    {
      "token": "JWT_TOKEN"
    }
    ```


### 2. Register
- **Método:** POST

- **Endpoint:** `/api/register`

- **Parâmetros:**

    - `name` (string, obrigatório): Nome do usuário.
    - `email` (string, obrigatório): E-mail do usuário.
    - `password` (string, obrigatório): Senha do usuário.
- **Resposta de Sucesso:**

    - **Código:** 201 Created
    - **Corpo:**
     ```json
     {
  "message": "User registered successfully"
  } 
  ```
  


### 3. Criar um Novo Plano de Férias
- **Método:** POST

- **Endpoint:** `/api/holiday-plans`

- **Parâmetros:**

    - `title` (string, obrigatório): O título do plano de férias.
    - `description` (string, obrigatório): Descrição do plano de férias.
     - `date` (string, obrigatório): Data do plano de férias.
     - `location` (string, obrigatório): Local do plano de férias.
     - `participants` (string, opcional): Participantes do plano de férias.
- Resposta de Sucesso:

    - Código: 201 Created
    - Corpo:
    ```json
    {
  "title": "Título do Plano",
  "description": "Descrição do Plano",
  "date": "2024-08-01",
  "location": "Local",
  "participants": "Participantes",
  "updated_at": "2024-08-01T12:00:00Z",
  "created_at": "2024-08-01T12:00:00Z",
  "id": 1
  }
  ```



### 4. Recuperar Todos os Planos de Férias
- **Método:** GET

- **Endpoint:** `/api/holiday-plans`

- **Resposta de Sucesso:**

    - **Código:** 200 OK
    - **Corpo:**
    ```json
    [
        {
            "title": "Título do Plano",
            "description": "Descrição do Plano",
            "date": "2024-08-01",
            "location": "Local",
            "participants": "Participantes",
            "updated_at": "2024-08-01T12:00:00Z",
            "created_at": "2024-08-01T12:00:00Z",
            "id": 1
        }
    ]
    ```



### 5. Recuperar um Plano de Férias Específico
- **Método:** GET

- **Endpoint:** `/api/holiday-plans/{id}`

- **Parâmetros:**

    - `id` (integer, obrigatório): ID do plano de férias.
- **Resposta de Sucesso:**

    - **Código:** 200 OK
    - **Corpo:**
    ```json
    {
  "title": "Título do Plano",
  "description": "Descrição do Plano",
  "date": "2024-08-01",
  "location": "Local",
  "participants": "Participantes",
  "updated_at": "2024-08-01T12:00:00Z",
  "created_at": "2024-08-01T12:00:00Z",
  "id": 1
  }
  ```


### 6. Atualizar um Plano de Férias
- **Método:** PUT

- **Endpoint:** `/api/holiday-plans/{id}`

- **Parâmetros:**

    - `id` (integer, obrigatório): ID do plano de férias a ser atualizado.
    - `title` (string, obrigatório): O título do plano de férias.
    - `description` (string, obrigatório): Descrição do plano de férias.
    - `date` (string, obrigatório): Data do plano de férias.
    - `location` (string, obrigatório): Local do plano de férias.
    - `participants` (string, opcional): Participantes do plano de férias.
- **Resposta de Sucesso:**

    - **Código: 200 OK
    - **Corpo:**
```json
{
  "title": "Título Atualizado",
  "description": "Descrição Atualizada",
  "date": "2024-08-01",
  "location": "Local Atualizado",
  "participants": "Participantes Atualizados",
  "updated_at": "2024-08-01T12:00:00Z",
  "created_at": "2024-08-01T12:00:00Z",
  "id": 1
  }
  ```



### 7. Excluir um Plano de Férias
- **Método:** DELETE

- **Endpoint:** `/api/holiday-plans/{id}`

- **Parâmetros:**

    - `id` (integer, obrigatório): ID do plano de férias a ser excluído.
- **Resposta de Sucesso:**

    - **Código:** 204 No Content

### 8. Gerar PDF para um Plano de Férias
- **Método:** GET

- **Endpoint:** `/api/holiday-plans/{id}/pdf`

- **Parâmetros:**

    - `id` (integer, obrigatório): ID do plano de férias para gerar o PDF.
- **Resposta de Sucesso:**

    - **Código:** 200 OK
    - **Tipo de Conteúdo:** `application/pdf`
    - **Descrição:** Arquivo PDF contendo o plano de férias.

### 9. Gerar PDF para todos os Planos de Férias
- **Método:** GET

- **Endpoint:** `/api/holiday-plans-all`

- **Resposta de Sucesso:**

    - **Código:** 200 OK
    - **Tipo de Conteúdo:** `application/pdf`
    - **Descrição:** Arquivo PDF contendo o plano de férias.

## Instalação
Clone o Repositório:

```bash
git clone https://github.com/nataldelima/holiday_plans.git
cd holiday_plans
```


## Instale as Dependências:

```bash
composer install
```


## Configure o Ambiente:
Copie o arquivo `.env.example` para .env e ajuste as configurações conforme necessário.

```bash
cp .env.example .env
```

## Gere a Chave de Aplicativo:

```bash
php artisan key:generate
```

## Execute as Migrations:

```bash
php artisan migrate
```

## Execute os Testes:

```bash
php artisan test
```

## Inicie o Servidor:

```bash
php artisan serve
```
## Informações adicionais
API produzida por [Natal Lima](https://nataldelima.github.io)



# Obrigado por usar nossa API!
