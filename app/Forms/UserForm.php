<?php namespace Chitunet\Forms;

use Kris\LaravelFormBuilder\Form;

class UserForm extends Form {

    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('email', 'text')
            ->add('password', 'password');
    }
}