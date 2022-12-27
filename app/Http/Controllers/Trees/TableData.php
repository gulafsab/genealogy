<?php

namespace App\Http\Controllers\Trees;

use App\Http\Controllers\Controller;
use LaravelEnso\Tables\Traits\Data;
use App\Tables\Builders\TreeTable;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = TreeTable::class;
}
