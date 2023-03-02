<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    const BASE_URL = '/api/v1';
    const PERSON_LIST = '/list';
    const PERSON_CREATE = '/create';
    const PERSON_UPDATE = '/update';
    const PERSON_DELETE = '/destroy';
    const PERSON_SHOW = '/show';

    protected function withErrors()
    {
        $this->withoutExceptionHandling();
    }
}
