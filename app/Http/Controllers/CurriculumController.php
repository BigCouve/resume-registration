<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\CurriculumRequest;


class CurriculumController extends Controller
{
    public function index()
    {
        return Inertia::render('Curriculum/Index');
    }

    public function store(CurriculumRequest $request)
    {
        dd($request->all());
        // $curriculum = Curriculum::all()->create($request->all());
        // $data = [
        //     "curriculum" => $curriculum,
        // ];
        // return response()->json($data);
    }
}
