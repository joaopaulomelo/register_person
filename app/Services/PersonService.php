<?php

namespace App\Services;

use App\Models\Person;
use App\Models\PersonPhone;

class PersonService
{
    private $person;

    public function __construct(Person $person)
    {
        $this->person = $person;
    }

    public function create($request)
    {
        $person = $this->person->create($request->only($this->person->getFillable()));
         PersonPhone::created([
            'phone' => $request->phone,
            'people_id' => $person->id
        ]);
        return $person;
    }

    public function update($person_id, $request)
    {
        $person = $this->person->find($person_id);

        if ($person) {
            $person->name = $request->name;
            $person->email = $request->email;
            $person->birth_date = $request->birth_date;
            $person->nationality = $request->nationality;
            $person->save();

            return $person;
        } else {
            return null;
        }
    }

    public function show($person_id)
    {
        return $this->person->find($person_id);
    }

    public function destroy($person_id)
    {
        $person = $this->show($person_id);

        if ($person) {
            // $this->person->find($person_id)->delete();
            // $collection = PersonPhone::where('people_id', $person_id)->get(['id']);
            // PersonPhone::destroy($collection->toArray());

            return true;
        } else {
            return false;
        }
    }

    public function list()
    {
        $person = Person::all();

        return $person;
    }
}
