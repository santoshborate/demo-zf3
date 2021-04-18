<?php

declare(strict_types=1);

namespace Application\Form;

use Laminas\Form\Form;
use Laminas\InputFilter\InputFilter;

class RouterForm extends Form
{
    public function __construct()
    {
        // Define form name
        parent::__construct('router-form');

        $this->setAttribute('method', 'post');

        $this->addElements();
        $this->addInputFilter();
    }

    /**
     * @return void
     */
    protected function addElements(): void
    {
        $this->add([
            'type'  => 'hidden',
            'name' => 'id',
            'attributes' => [
                'id' => 'id'
            ],
            'options' => [
                'label' => 'id',
            ],
        ]);

        $this->add([
            'type'  => 'text',
            'name' => 'sapid',
            'attributes' => [
                'id' => 'sapid'
            ],
            'options' => [
                'label' => 'Sapid',
            ],
        ]);

        $this->add([
            'type'  => 'text',
            'name' => 'hostname',
            'attributes' => [
                'id' => 'hostname'
            ],
            'options' => [
                'label' => 'Hostname',
            ],
        ]);

        $this->add([
            'type'  => 'text',
            'name' => 'loopback',
            'attributes' => [
                'id' => 'loopback'
            ],
            'options' => [
                'label' => 'Loopback',
            ],
        ]);

        $this->add([
            'type'  => 'text',
            'name' => 'macaddress',
            'attributes' => [
                'id' => 'macaddress'
            ],
            'options' => [
                'label' => 'Macaddress',
            ],
        ]);

        $this->add([
            'type'  => 'select',
            'name' => 'archive',
            'attributes' => [
                'id' => 'archive'
            ],
            'options' => [
                'label' => 'Archive',
                'value_options' => [
                    0 => 'No',
                    1 => 'Yes',
                ]
            ],
        ]);

        $this->add([
            'type'  => 'submit',
            'name' => 'submit',
            'attributes' => [
                'value' => 'Create',
                'id' => 'submitbutton',
            ],
        ]);
    }

    /**
     * @return void
     */
    private function addInputFilter(): void
    {
        $inputFilter = new InputFilter();
        $this->setInputFilter($inputFilter);

        $inputFilter->add([
            'name'     => 'id',
            'required' => true,
            'filters'  => [
                ['name' => 'ToInt'],
            ],
        ]);

        $inputFilter->add([
            'name'     => 'sapid',
            'required' => true,
            'filters'  => [
                ['name' => 'ToInt'],
            ],
            'validators' => [
                [
                    'name' => 'IsInt',
                ],
                [
                    'name'    => 'GreaterThan',
                    'options' => [
                        'min' => 0,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name'     => 'hostname',
            'required' => true,
            'filters'  => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
            ],
            'validators' => [
                [
                    'name'    => 'StringLength',
                    'options' => [
                        'min' => 1,
                        'max' => 100
                    ],
                ],
            ],
        ]);

         $inputFilter->add([
            'name' => 'archive',
            'required' => true,
             'filters'  => [
                 ['name' => 'ToInt'],
             ],
            'validators' => [
                [
                    'name' => 'InArray',
                    'options'=> [
                        'haystack' => [0, 1],
                    ]
                ],
            ],
        ]);
    }
}
