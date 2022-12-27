<?php

namespace App\Http\Controllers\Trees;

use App\Forms\Builders\TreeForm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Create extends Controller
{
    public function __invoke(TreeForm $form)
    {
        return ['form' => $form->create()];
    }
}
