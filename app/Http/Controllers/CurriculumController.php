<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\CurriculumRequest;
use App\Models\Curriculum;


class CurriculumController extends Controller
{
    public function index()
    {
        return Inertia::render('Curriculum/Index');
    }

    public function store(CurriculumRequest $request)
    {
        $curriculum;


        $curriculum = Curriculum::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'schooling' => $request['schooling'],
            'desired_job' => $request['desired-job'],
            'observations' => $request['observations'],
            // 'document' => $request['file-upload'],
            'document' => rand() . '.' . $request->file('file-upload')->getClientOriginalExtension(),
            'IPV4_address' => $_SERVER['REMOTE_ADDR'],
        ]);

        $data = [
            "curriculum" => $curriculum,
        ];

        return response()->json($data);
    }
}
