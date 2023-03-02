<?php

namespace Tests\Feature;

use App\Models\Person;
use App\Models\PersonPhone;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PersonTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function should_return_status_code_201_and_person_created_when_params_is_valid()
    {

        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'cpf' => '01425369874',
            'phone' => $this->faker->phoneNumber,
            'birth_date' => $this->faker->date,
            'nationality' => 'Brazil'
        ];

        $response = $this->post($this::BASE_URL.$this::PERSON_CREATE, $data);
        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function should_return_status_code_204_when_person_is_deleted()
    {

        $person = Person::factory()->create();
        PersonPhone::factory()->create([
            'phone' => $person->phone,
            'person_id' => $person->id
        ]);

        $response = $this->delete($this::BASE_URL.$this::PERSON_DELETE."/$person->id");

        $response->assertStatus(204);
    }

     /**
     * @test
     */
    public function should_return_status_code_404_when_the_person_id_not_found()
    {

        $person_id = 2;

        $response = $this->delete($this::BASE_URL.$this::PERSON_DELETE."/$person_id");

        $response->assertStatus(404);

    }

    /**
     * @test
     */
    public function should_return_status_code_200_and_person()
    {

        Person::factory()->count(5)->create();

        $response = $this->get($this::BASE_URL . $this::PERSON_LIST);
        $response->assertStatus(200);
        $response->assertJsonCount(5);
    }

    /**
     * @test
     */
    public function should_return_status_code_200_when_person_is_add_and_return_person_updated()
    {
        $person_id = Person::factory()->create()->id;

        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'cpf' => '01425369874',
            'phone' => $this->faker->phoneNumber,
            'birth_date' => $this->faker->date,
            'nationality' => 'Brazil'
        ];
        $response = $this->put($this::BASE_URL . $this::PERSON_UPDATE . "/$person_id", $data);

        $response->assertStatus(200);
    }

     /**
     * @test
     */
    public function should_return_status_code_200_and_person_by_id()
    {
        $person_id = Person::factory()->create()->id;

        $response = $this->get($this::BASE_URL.$this::PERSON_SHOW."/$person_id");

        $response->assertStatus(200);

        $response->assertJson(['id' => $person_id]);
    }

    /**
     * @test
     */
    public function should_return_status_code_404_when_the_id_not_found()
    {
        $response = $this->get($this::BASE_URL.$this::PERSON_SHOW."/2");

        $response->assertStatus(404);
    }

}
