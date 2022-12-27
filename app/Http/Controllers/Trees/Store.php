<?php

namespace App\Http\Controllers\Trees;

use App\Http\Controllers\Controller;
use App\Models\Tree;
use Illuminate\Http\Request;

class Store extends Controller
{
    public function __invoke(Request $request, Tree $tree)
    {
        $tree->fill($request->validated())->save();

        return [
            'message' => __('The tree was successfully created'),
            'redirect' => 'tree.index',
            'param' => ['repository' => $tree->id],
        ];
    }
}
