<?php namespace Chitunet\Forms;

use Kris\LaravelFormBuilder\Form;

class PermissionForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('display_name', 'text');
    }
}