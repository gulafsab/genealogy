<?php


namespace App\Forms\Builders;
use App\Models\Tree;
use LaravelEnso\Forms\Services\Form;
class TreeForm
{
    protected const TemplatePath = __DIR__.'/../Templates/trees.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form
            //    ->options('type_id', Type::all())
            ->create();
    }

    public function edit(Tree $tree)
    {
        return $this->form
            //   ->options('type_id', Type::all())
            ->edit($tree);
    }
}
