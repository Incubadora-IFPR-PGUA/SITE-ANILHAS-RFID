<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AnilhaPendente;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Facades\Permissions;

class PendenteAnilhaPolicy {
    use HandlesAuthorization;

    public function __construct() {
    }
    
    public function hasFullPermission() {
        return Permissions::isAuthorized('pendencias');
    }
}