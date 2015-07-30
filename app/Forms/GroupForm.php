<?php namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class GroupForm extends Form {

    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('desc', 'text')
            ->add('photo', 'media')
            ->add('type', 'text');
    }
}