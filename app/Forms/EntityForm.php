<?php namespace Chitunet\Forms;

use Kris\LaravelFormBuilder\Form;

class EntityForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('description', 'text')
            ->add('body', 'textarea');
    }
}