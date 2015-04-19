<?php namespace Chitunet\Forms;

use Kris\LaravelFormBuilder\Form;

class RoleForm extends Form {

    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('display_name', 'text')
            ->add('description', 'text');
    }
}