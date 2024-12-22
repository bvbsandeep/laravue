<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Response;
use App\Models\Task;
use Illuminate\Support\Facades\Date;

class TaskController extends Controller
{
    public function createTask(TaskRequest $request)
    {
        $response = [];
        $status = Response::HTTP_OK;
        try {
            $response = Task::create([
                'title' => $request->post('title'),
                'priority' => $request->post('priority'),
                'due_date' => $request->post('due_date')
            ]);
        } catch (\Exception $ex) {
            $status = Response::HTTP_UNPROCESSABLE_ENTITY;
            $response['message'] = $ex->getMessage();
        }

        return response()->json($response, $status);
    }


    public function getUpcomingTasks()
    {
        $response = [];
        $status = Response::HTTP_OK;
        try {
            $today = Date::today();
            $selected_today = $today->toDateString();
            $thatday = $today->addDays(7);
            $response = Task::whereDate('due_date', '>=', $selected_today)
            ->whereDate('due_date', '<=', $thatday->toDateString())->get()->toArray();
        } catch (\Exception $ex) {
            $status = Response::HTTP_UNPROCESSABLE_ENTITY;
            $response['message'] = $ex->getMessage();
        }

        return response()->json($response, $status);
    }

}
