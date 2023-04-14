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
        $fileName = rand() . '.' . $request->file('file-upload')->getClientOriginalExtension();
        $file = $request['file-upload'];
        $dataFilteredToMail = [
            'Nome' => $request['name'],
            'Email' => $request['email'],
            'Telefone' => $request['phone'],
            'Escolaridade' => $request['schooling'],
            'Cargo Desejado' => $request['desired-job'],
            'Observações' => $request['observations'],
        ];

        $curriculum = Curriculum::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'schooling' => $request['schooling'],
            'desired_job' => $request['desired-job'],
            'observations' => $request['observations'],
            'document' => $fileName,
            'IPV4_address' => $_SERVER['REMOTE_ADDR'],
        ]);

        Mail::to($request['email'])->send(new CurriculumMail($dataFilteredToMail, $fileName, $file));

        $data = ["curriculum" => $curriculum];

        return response()->json($data);
    }
}
