<?php

namespace FjordApp\Controllers\Form\Navigations;

use Fjord\Crud\Controllers\FormController;
use Fjord\User\Models\FjordUser;

class MainNavigationController extends FormController
{
    /**
     * Authorize request for authenticated fjord-user and permission operation.
     * Operations: read, update
     *
     * @param FjordUser $user
     * @param string $operation
     * @return boolean
     */
    public function authorize(FjordUser $user, string $operation): bool
    {
        return true;
    }
}
