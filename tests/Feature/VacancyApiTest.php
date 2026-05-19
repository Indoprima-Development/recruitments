<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Ptkform;
use App\Models\Ptkformtransaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VacancyApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Helper to create a valid, fully populated vacancy record.
     */
    private function createTestVacancy(): Ptkform
    {
        $division = new \App\Models\Division();
        $division->division_name = 'Technology';
        $division->save();

        $department = new \App\Models\Department();
        $department->division_id = $division->id;
        $department->department_name = 'Engineering';
        $department->save();

        $section = new \App\Models\Section();
        $section->department_id = $department->id;
        $section->section_name = 'Web Development';
        $section->save();

        $jobtitle = new \App\Models\Jobtitle();
        $jobtitle->section_id = $section->id;
        $jobtitle->jobtitle_name = 'Fullstack Engineer';
        $jobtitle->save();

        $education = new \App\Models\Education();
        $education->education_name = 'Bachelor Degree';
        $education->save();

        $major = new \App\Models\Major();
        $major->major_name = 'Computer Science';
        $major->save();

        $ptkform = new Ptkform();
        $ptkform->division_id = $division->id;
        $ptkform->department_id = $department->id;
        $ptkform->section_id = $section->id;
        $ptkform->jobtitle_id = $jobtitle->id;
        $ptkform->education_id = $education->id;
        $ptkform->major_id = $major->id;
        $ptkform->date_startwork = '2026-06-01';
        $ptkform->direct_superior = 'Engineering Manager';
        $ptkform->direct_junior = 'Junior Developer';
        $ptkform->responsibility = 'Build and maintain web applications.';
        $ptkform->gender = 1;
        $ptkform->ipk = 3.00;
        $ptkform->special_conditions = 'None';
        $ptkform->general_others = 'None';
        $ptkform->request_basis = 'Replacement';
        $ptkform->request_basis_for = 'John Doe';
        $ptkform->status = 1;
        $ptkform->date_open_vacancy = date('Y-m-d', strtotime('-1 day'));
        $ptkform->date_closed_vacancy = date('Y-m-d', strtotime('+5 days'));
        $ptkform->save();

        return $ptkform;
    }

    public function test_can_list_active_vacancies(): void
    {
        $ptkform = $this->createTestVacancy();

        $response = $this->getJson('/api/vacancies');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    '*' => [
                        'id',
                        'job_title',
                        'division',
                        'department',
                        'section',
                        'education',
                        'major',
                        'gender',
                        'ipk',
                        'date_open_vacancy',
                        'date_closed_vacancy',
                        'responsibility',
                        'special_conditions',
                        'general_others',
                        'experience_requirements',
                    ]
                ]
            ])
            ->assertJsonFragment([
                'job_title' => 'Fullstack Engineer',
                'division' => 'Technology',
                'department' => 'Engineering',
                'section' => 'Web Development',
                'education' => 'Bachelor Degree',
                'major' => 'Computer Science',
            ]);
    }

    public function test_can_list_participants_by_vacancy_id(): void
    {
        $ptkform = $this->createTestVacancy();

        // Create a user and apply
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
            'ktp' => '1234567890123456',
            'cv' => 'cv/1.pdf',
        ]);

        Ptkformtransaction::create([
            'ptkform_id' => $ptkform->id,
            'user_id' => $user->id,
            'status' => 0,
            'score_candidate' => 80,
            'experience_years' => 2,
            'experience_months' => 6,
        ]);

        $response = $this->getJson("/api/vacancies/{$ptkform->id}/participants");

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Participants retrieved successfully',
                'data' => [
                    [
                        'ktp' => '1234567890123456',
                        'name' => 'John Doe',
                        'cv' => url('cv/1.pdf'),
                    ]
                ]
            ]);
    }

    public function test_returns_404_for_non_existent_vacancy_participants(): void
    {
        $response = $this->getJson('/api/vacancies/9999/participants');

        $response->assertStatus(404)
            ->assertJson([
                'success' => false,
                'message' => 'Vacancy not found',
                'data' => []
            ]);
    }

    public function test_can_update_status_for_participant_transaction(): void
    {
        $ptkform = $this->createTestVacancy();

        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
        ]);

        $transaction = Ptkformtransaction::create([
            'ptkform_id' => $ptkform->id,
            'user_id' => $user->id,
            'status' => '0',
            'score_candidate' => 80,
            'experience_years' => 2,
            'experience_months' => 6,
        ]);

        $response = $this->postJson("/api/participants/{$transaction->id}/status", [
            'status' => '1',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Status updated successfully',
                'data' => [
                    'id' => $transaction->id,
                    'status' => '1',
                ]
            ]);

        $this->assertDatabaseHas('ptkformtransactions', [
            'id' => $transaction->id,
            'status' => '1',
        ]);
    }
}
