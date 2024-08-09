<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\HolidayPlans;
use App\Models\User;
use Laravel\Passport\Passport;
use PHPUnit\Framework\Attributes\Test;

class HolidayPlansTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_retrieve_all_holiday_plans()
    {

        // Cria um usuário e gera um token de acesso
        $user = User::factory()->create();
        Passport::actingAs($user);

        // Cria um plano de férias para o teste
        HolidayPlans::factory()->create();

        // Envia uma solicitação GET para a rota da API
        $response = $this->get('/api/holiday-plans');

        // Verifica se a resposta tem um status de 200 (OK)
        $response->assertStatus(200);

        // Verifica se a resposta contém dados específicos
        $response->assertJsonStructure([
            '*' => ['id', 'title', 'description', 'date', 'location', 'participants', 'created_at', 'updated_at'],
        ]);
    }

    #[Test]
    public function it_can_create_a_holiday_plan()
    {
        // Cria um usuário e gera um token de acesso
        $user = User::factory()->create();
        Passport::actingAs($user);


        // Dados para enviar na solicitação POST
        $data = [
            'title' => 'Holiday in Paris',
            'description' => 'A wonderful trip to Paris.',
            'date' => '2024-12-25',
            'location' => 'Paris',
            'participants' => ['John Doe', 'Jane Doe'],
        ];

        // Envia uma solicitação POST para criar um novo plano de férias
        $response = $this->post('/api/holiday-plans', $data);

        // Verifica se a resposta tem um status de 201 (Created)
        $response->assertStatus(201);

        // Verifica se a resposta contém os dados esperados
        $response->assertJson([
            'title' => 'Holiday in Paris',
            'description' => 'A wonderful trip to Paris.',
            'date' => '2024-12-25',
            'location' => 'Paris',
            'participants' => ['John Doe', 'Jane Doe'],
        ]);
    }

    #[Test]
    public function it_can_retrieve_a_specific_holiday_plan()
    {

        // Cria um usuário e gera um token de acesso
        $user = User::factory()->create();
        Passport::actingAs($user);


        // Cria um plano de férias para o teste
        $plan = HolidayPlans::factory()->create();

        // Envia uma solicitação GET para a rota da API com o ID do plano
        $response = $this->get('/api/holiday-plans/' . $plan->id);

        // Verifica se a resposta tem um status de 200 (OK)
        $response->assertStatus(200);

        // Verifica se a resposta contém os dados do plano específico
        $response->assertJson([
            'id' => $plan->id,
            'title' => $plan->title,
            'description' => $plan->description,
            'date' => $plan->date,
            'location' => $plan->location,
            'participants' => $plan->participants,
        ]);
    }

    #[Test]
    public function it_can_update_a_holiday_plan()
    {
        // Cria um usuário e gera um token de acesso
        $user = User::factory()->create();
        Passport::actingAs($user);


        // Cria um plano de férias para o teste
        $plan = HolidayPlans::factory()->create();

        // Dados para atualizar o plano
        $data = [
            'title' => 'Updated Holiday in Paris',
            'description' => 'An updated description.',
            'date' => '2024-12-31',
            'location' => 'Paris',
            'participants' => ['John Doe', 'Jane Doe', 'Alice'],
        ];

        // Envia uma solicitação PUT para atualizar o plano
        $response = $this->put('/api/holiday-plans/' . $plan->id, $data);

        // Verifica se a resposta tem um status de 200 (OK)
        $response->assertStatus(200);

        // Verifica se a resposta contém os dados atualizados
        $response->assertJson($data);
    }

    #[Test]
    public function it_can_delete_a_holiday_plan()
    {

        // Cria um usuário e gera um token de acesso
        $user = User::factory()->create();
        Passport::actingAs($user);


        // Cria um plano de férias para o teste
        $plan = HolidayPlans::factory()->create();

        // Envia uma solicitação DELETE para excluir o plano
        $response = $this->delete('/api/holiday-plans/' . $plan->id);

        // Verifica se a resposta tem um status de 204 (No Content)
        $response->assertStatus(204);

        // Verifica se o plano foi realmente excluído
        $this->assertDatabaseMissing('holiday_plans', ['id' => $plan->id]);
    }
}
