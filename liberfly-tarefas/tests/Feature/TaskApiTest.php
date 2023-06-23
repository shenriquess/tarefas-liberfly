<?php

namespace Tests\Feature;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        // Apaga o banco de dados existente e recria as migrações
        Artisan::call('migrate:fresh');

        // Executa as migrações e semeia o banco de dados
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    public function testListTasks()
    {
        // Cria um usuário fictício para autenticação
        $user = \App\Models\User::create([
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => bcrypt('password'),
        ]);

        // Autentica o usuário
        $token = Auth::guard('api')->login($user);

        // Define o token de autenticação no cabeçalho da requisição
        $headers = ['Authorization' => 'Bearer ' . $token];

        //Cria as tarefas
        Artisan::call('db:seed', ['--class' => 'TaskSeeder']);

        // Faz a requisição para a listagem de tarefas
        $response = $this->withHeaders($headers)->get('/api/tarefas');

        // Verifica se a resposta foi bem-sucedida (código HTTP 200)
        $response->assertStatus(200);

        // Verifica se a resposta contém os dados das tarefas
        if ($response->status() === 200) {
            $responseData = $response->json();
            if (!empty($responseData)) {
                $response->assertJsonStructure([
                    '*' => [
                        'id',
                        'titulo',
                        'descricao',
                        'prazo',
                        'concluida',
                        'created_at',
                        'updated_at',
                    ],
                ]);
            }
        }

    }

    public function testShowTask()
    {
        // Atualiza o banco de dados fictício

         // Cria um usuário fictício para autenticação
         $user = \App\Models\User::create([
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => bcrypt('password'),
        ]);

        //Cria as tarefas
        Artisan::call('db:seed', ['--class' => 'TaskSeeder']);

        // Autentica o usuário
        $token = Auth::guard('api')->login($user);

        // Define o token de autenticação no cabeçalho da requisição
        $headers = ['Authorization' => 'Bearer ' . $token];
        

        // Obtém o ID de uma tarefa existente (você pode ajustar de acordo com os dados do seu banco de dados)
        $taskId = 1;

        // Faz a requisição para exibir uma tarefa específica
        $response = $this->withHeaders($headers)->get('/api/tarefas/' . $taskId);

        // Verifica se a resposta foi bem-sucedida (código HTTP 200)
        $response->assertStatus(200);

        // Verifica se a resposta contém os dados da tarefa, somente se a tarefa existir
        if ($response->status() === 200) {
            $responseData = $response->json();
            if (isset($responseData['id'])) {
                $response->assertJsonStructure([
                    'id',
                    'titulo',
                    'descricao',
                    'prazo',
                    'concluida',
                    'created_at',
                    'updated_at',
                ]);
            }
        }
    }
}