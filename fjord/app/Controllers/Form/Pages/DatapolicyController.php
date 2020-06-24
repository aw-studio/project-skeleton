<?php

namespace FjordApp\Controllers\Form\Pages;

use Fjord\User\Models\FjordUser;
use Fjord\Crud\Controllers\FormController;
use FjordApp\Config\Form\Pages\DatapolicyConfig;

class DatapolicyController extends FormController
{
    /**
     * Form config class.
     *
     * @var string
     */
    protected $config = DatapolicyConfig::class;

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
        return $user->can("{$operation} pages");
    }
}
