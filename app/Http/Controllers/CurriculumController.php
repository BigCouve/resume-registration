<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\CurriculumRequest;
use App\Models\Curriculum;
use App\Mail\CurriculumMail;
use Illuminate\Support\Facades\Mail;


class CurriculumController extends Controller
{
    public function index()
    {
        return Inertia::render('Curriculum/Index');
    }

    public function store(CurriculumRequest $request)
    {
        $curriculum;
        $fileName = rand() . '.' . $request->file('file-upload')->getClientOriginalExtension();

        $curriculum = Curriculum::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'schooling' => $request['schooling'],
            'desired_job' => $request['desired-job'],
            'observations' => $request['observations'],
            // 'document' => $request['file-upload'],
            'document' => $fileName,
            'IPV4_address' => $_SERVER['REMOTE_ADDR'],
        ]);

        Mail::to($request['email'])->send(new CurriculumMail($request->all(), $fileName));

        $data = [
            "curriculum" => $curriculum,
        ];

        return response()->json($data);
    }
}
