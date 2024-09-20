<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AnilhaCadastro;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Facades\Permissions;

class CadastroAnilhaPolicy {
    use HandlesAuthorization;

    public function __construct() {
    }
    
    public function hasFullPermission() {
        return Permissions::isAuthorized('cadastros');
    }
}