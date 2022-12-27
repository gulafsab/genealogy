<?php

namespace App\Http\Controllers\Trees;

use App\Http\Controllers\Controller;
use LaravelEnso\Tables\Traits\Init;
use App\Tables\Builders\TreeTable;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = TreeTable::class;
}
