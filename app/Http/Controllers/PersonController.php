<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Services\PersonService;

class PersonController extends Controller
{
    private $personService;

    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
    }

    public function create(PersonRequest $request)
    {
        $person = $this->personService->create($request);

        return response()->json($person, 201);
    }

    public function update($person_id, PersonRequest $request)
    {
        $person = $this->personService->update($person_id, $request);

        if ($person) {
            return response()->json($person, 200);
        } else {
            return response()->json(['error' => 'Not Found'], 404);
        }
    }

    public function show($person_id)
    {
        $person = $this->personService->show($person_id);

        if ($person) {
            return response()->json($person, 200);
        } else {
            return response()->json(['error' => 'Not Found'], 404);
        }
    }

    public function destroy($person_id)
    {
        $person = $this->personService->destroy($person_id);

        if ($person) {
            return response()->json([], 204);
        } else {
            return response()->json(['error' => 'Not Found'], 404);
        }
    }

    public function list()
    {
        $person = $this->personService->list();

        return response()->json($person, 200);
    }

}
