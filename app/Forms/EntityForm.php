<?php namespace Chitunet\Forms;

use Kris\LaravelFormBuilder\Form;

class EntityForm extends Form {

    public function buildForm()
    {
        $this
            ->add('name', 'text', [ 'label' => '名字' ])
            ->add('description', 'text', [ 'label' => '描述' ])
            ->add('photo', 'media', [ 'label' => '图片', 'data-inputid'=>'photo',  'attr' => [ 'class' => 'form-control popup_selector' ] ])
            ->add('body', 'textarea', [ 'label' => '正文' ]);
    }
}