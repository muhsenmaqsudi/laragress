<?php

namespace App\Passport;

use Laravel\Passport\Client as BaseClient;

class PkceClient extends BaseClient
{
    public function skipsAuthorization()
    {
        return $this->firstParty();
    }
}
