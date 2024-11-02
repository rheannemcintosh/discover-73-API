<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityGroupRequest;
use App\Http\Requests\StoreActivityRequest;
use App\Models\Activity;
use App\Models\ActivityGroup;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $activity = Activity::create($request->validated());

            return response()->json([
                'success' => true,
                'data' => $activity
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating the activity',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
