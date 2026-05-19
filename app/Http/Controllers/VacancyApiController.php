<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ptkform;
use App\Models\Ptkformtransaction;
use Illuminate\Http\Request;

class VacancyApiController extends Controller
{
    /**
     * Get list of active/open vacancies.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listVacancies()
    {
        $date = date("Y-m-d");

        $vacancies = Ptkform::with(['jobtitle', 'division', 'department', 'section', 'education', 'major', 'ptkfields.field'])
            ->where("status", 1)
            ->whereDate('date_open_vacancy', '<=', $date)
            ->whereDate('date_closed_vacancy', '>=', $date)
            ->orderBy('id', 'desc')
            ->get()
            ->map(function ($vacancy) {
                return [
                    'id' => $vacancy->id,
                    'job_title' => $vacancy->jobtitle ? $vacancy->jobtitle->jobtitle_name : null,
                    'division' => $vacancy->division ? $vacancy->division->division_name : null,
                    'department' => $vacancy->department ? $vacancy->department->department_name : null,
                    'section' => $vacancy->section ? $vacancy->section->section_name : null,
                    'education' => $vacancy->education ? $vacancy->education->education_name : null,
                    'major' => $vacancy->major ? $vacancy->major->major_name : null,
                    'gender' => $vacancy->gender,
                    'ipk' => $vacancy->ipk,
                    'date_open_vacancy' => $vacancy->date_open_vacancy,
                    'date_closed_vacancy' => $vacancy->date_closed_vacancy,
                    'responsibility' => $vacancy->responsibility,
                    'special_conditions' => $vacancy->special_conditions,
                    'general_others' => $vacancy->general_others,
                    'experience_requirements' => $vacancy->ptkfields->map(function ($ptkfield) {
                        return [
                            'field' => $ptkfield->field ? $ptkfield->field->field_name : null,
                            'years' => $ptkfield->year
                        ];
                    }),
                ];
            });

        return response()->json([
            'success' => true,
            'message' => 'Vacancies retrieved successfully',
            'data' => $vacancies
        ], 200);
    }

    /**
     * Get list of participants by vacancy ID.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function listParticipants($id)
    {
        $vacancy = Ptkform::find($id);

        if (!$vacancy) {
            return response()->json([
                'success' => false,
                'message' => 'Vacancy not found',
                'data' => []
            ], 404);
        }

        $participants = Ptkformtransaction::where('ptkform_id', $id)
            ->whereNull('ai_score')
            ->with(['user.datadiri'])
            ->get()
            ->map(function ($transaction) {
                $user = $transaction->user;
                $datadiri = $user ? $user->datadiri : null;

                $ktp = $user && $user->ktp ? $user->ktp : ($datadiri ? $datadiri->ktp : null);
                $name = $user && $user->name ? $user->name : ($datadiri ? $datadiri->name : null);
                $cv = $user && $user->cv ? url($user->cv) : null;

                return [
                    'id' => $transaction->id,
                    'ktp' => $ktp,
                    'name' => $name,
                    'cv' => $cv,
                ];
            });

        return response()->json([
            'success' => true,
            'message' => 'Participants retrieved successfully',
            'data' => $participants
        ], 200);
    }

    /**
     * Update the AI score for a participant transaction.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAiScore(Request $request, $id)
    {
        $request->validate([
            'ai_score' => 'required|numeric|min:0|max:100',
        ]);

        $transaction = Ptkformtransaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Participant transaction not found',
            ], 404);
        }

        $transaction->ai_score = $request->input('ai_score');
        $transaction->save();

        // Automatically regenerate cache JSON to keep the main dashboard instantly synchronized
        try {
            app(\App\Http\Controllers\PtkformtransactionsController::class)->saveDataJson();
        } catch (\Exception $e) {
            \Log::error('Failed to auto-generate JSON data on updateAiScore: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'AI Score updated successfully',
            'data' => [
                'id' => $transaction->id,
                'ai_score' => $transaction->ai_score
            ]
        ], 200);
    }
}
