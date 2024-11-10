<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityGroupRequest;
use App\Models\ActivityGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivityGroupController extends Controller
{
    /**
     * Display all activity groups.
     */
    public function index()
    {
        return response()->json(
            ActivityGroup:: with(['activities' => function ($query) {
                $query->select(
                    'id',
                    'name',
                    'activity_group_id',
                    'description',
                    'status'
                );
            }])->select(
        'id',
                'name',
                'description',
                'status'
            )->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityGroupRequest $request)
    {
        try {
            $activityGroup = ActivityGroup::create($request->validated());

            return response()->json([
                'success' => true,
                'data' => $activityGroup
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating the activity group',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $activityGroup = ActivityGroup::with('activities')->find($id);

        if (!$activityGroup) {
            return response()->json([
                'success' => false,
                'message' => 'Activity group not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $activityGroup
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activityGroup = ActivityGroup::find($id);

        if (!$activityGroup) {
            return response()->json([
                'success' => false,
                'message' => 'Activity group not found'
            ], 404);
        }

        $activityGroup->delete();

        return response()->json([
            'success' => true,
            'message' => 'Activity group deleted successfully'
        ]);
    }
}
