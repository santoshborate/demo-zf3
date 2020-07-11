<?php
declare(strict_types=1);

namespace Application\Form;

use Laminas\Form\Form;
use Laminas\InputFilter\InputFilter;

class RouterForm extends Form
{
    /**
     * Constructor
     */
    public function __construct()
    {
        // Define form name
        parent::__construct('router-form');

        // Set POST method for this form
        $this->setAttribute('method', 'post');

        $this->addElements();
        $this->addInputFilter();
    }

    /**
     * This method adds elements to form (input fields and submit button).
     */
    protected function addElements()
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

        // Add "sapid" field
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

        // Add "hostname" field
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

        // Add "loopback" field
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

        // Add "macaddress" field
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

        // Add "archive" field
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

        // Add the submit button
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
     * This method creates input filter (used for form filtering/validation).
     */
    private function addInputFilter()
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
