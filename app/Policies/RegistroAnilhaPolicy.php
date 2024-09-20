<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AnilhaRegistro;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Facades\Permissions;

class RegistroAnilhaPolicy {
    use HandlesAuthorization;

    public function __construct() {
    }
    
    public function hasFullPermission() {
        return Permissions::isAuthorized('registros');
    }
}