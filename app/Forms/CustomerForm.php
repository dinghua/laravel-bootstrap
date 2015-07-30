<?php namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CustomerForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('email', 'text')
            ->add('phone', 'text')
            ->add('address', 'text')
            ->add('gender', 'select', [
                'choices'=>[
                    ''=>'',
                    '1'=>'Male',
                    '2'=>'Female'
                ]
            ])
            ->add('birth', 'date')
            ->add('avatar', 'media')
            ->add('memo', 'textarea');
    }
}