<?php

namespace App\Http\Controllers\Trees;

use App\Http\Controllers\Controller;
use App\Models\Tree;
use Illuminate\Http\Request;
use LaravelEnso\Select\Traits\OptionsBuilder;
class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Tree::class;

    protected $queryAttributes = ['name'];
}
