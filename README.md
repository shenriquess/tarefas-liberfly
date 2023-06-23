# API de Gerenciamento de Tarefas

Esta é uma API desenvolvida em Laravel para gerenciar tarefas. Ela permite a criação, atualização, listagem e exclusão de tarefas, além de fornecer endpoints para visualizar detalhes de tarefas específicas.

## Requisitos

Antes de executar a API, verifique se você possui os seguintes requisitos instalados em sua máquina:

- PHP (versão 7.4 ou superior)
- Composer (versão 2.0 ou superior)
- Banco de Dados (por exemplo, MySQL, SQLite)

## Configuração

Siga as etapas abaixo para configurar e executar a API:

1. Clone o repositório:

git clone https://github.com/seu-usuario/seu-repositorio.git

2. Instale as dependências:

cd minha-api-de-tarefas
composer install


3. Configure o arquivo `.env` com as informações do banco de dados:

cp .env.example .env
php artisan key:generate



Abra o arquivo `.env` e configure as seguintes variáveis de ambiente:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco_de_dados
DB_USERNAME=nome_de_usuario
DB_PASSWORD=senha_do_usuario


4. Execute as migrações do banco de dados e semeie o banco com dados fictícios:

php artisan db:seed --class=UserSeeder
php artisan db:seed --class=TaskSeeder

6. Acesse a documentação da API no navegador:

http://localhost:8000/api/documentation


Nesta página, você encontrará detalhes sobre os endpoints disponíveis, seus parâmetros, respostas e exemplos de solicitação.

## Endpoints

A API possui os seguintes endpoints:

- `GET /api/tarefas`: Retorna uma lista de todas as tarefas cadastradas.
- `GET /api/tarefas/{id}`: Retorna os detalhes de uma tarefa específica com base no ID fornecido.

## Executando as APIs pelo Postman

Você pode testar e executar as APIs da API de Gerenciamento de Tarefas usando o Postman. Siga as etapas abaixo para realizar as solicitações:

1. Abra o Postman em sua máquina. Crie uma nova solicitação. Selecione o método HTTP como POST. Insira a URL do endpoint de login da sua API (por exemplo, http://localhost:8000/api/login). Vá para a seção "Body" na área de edição da solicitação. Selecione "raw" como o tipo de corpo (body).
No menu suspenso ao lado de "raw", selecione "JSON". No campo de texto abaixo, insira as credenciais de login no formato JSON:

{
    "email": "usuario@example.com",
    "password": "senha123   "
}

Clique no botão "Send" para enviar a solicitação.

O Postman exibirá a resposta da sua API, incluindo o token JWT, se as credenciais forem válidas. 

Copie o valor do token JWT retornado na resposta.

2. Crie uma nova solicitação e defina a URL base da API:

http://localhost:8000/api/

3. Selecione o método de solicitação adequado (GET, POST, PUT, DELETE) e adicione a rota do endpoint desejado, por exemplo:

- `GET /tarefas`: Retorna todas as tarefas cadastradas.
- `GET /tarefas/{id}`: Retorna os detalhes de uma tarefa específica com base no ID fornecido.
4. Adicione os parâmetros e/ou corpo da solicitação, conforme necessário.

Por exemplo, para listar todas as tarefas, defina o método da solicitação como GET e insira a URL completa para a rota de tarefas. Por exemplo, http://localhost:8000/api/tarefas.

Na seção de cabeçalhos da solicitação, adicione um cabeçalho Authorization com o valor Bearer {seu-token-jwt}, substituindo "{seu-token-jwt}" pelo valor do token JWT copiado anteriormente.

Envie a solicitação para acessar as rotas protegidas. Se o token JWT for válido, você receberá uma resposta contendo as tarefas.


## Contribuição

Se você deseja contribuir com este projeto, fique à vontade para abrir uma issue ou enviar um pull request.

## Licença

Este projeto está licenciado sob a [MIT License](https://opensource.org/licenses/MIT).
