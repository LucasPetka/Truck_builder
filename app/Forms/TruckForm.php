<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use App\Truck_Brand;
use App\Rules\FirstAndLastName;
use App\Rules\Years;
use App\Rules\Integer;

class TruckForm extends Form
{
    public function buildForm()
    {
        
        $brands = Truck_Brand::all()->pluck('name', 'id')->toArray();
        $this
            ->add('brand', 'select', [
                'label' => 'Truck brand',
                'rules' => 'required',
                'error_messages' => [
                    'brand.required' => 'Select the brand.'
                ],
                'choices' => $brands,
                'empty_value' => 'Select the truck brand',
            ])


            ->add('year_made', 'text', [
                'label' => 'Year made',
                'rules' => new Years()
            ])
            ->add('full_name', 'text', [
                'label' => 'Current owner',
                'rules' => new FirstAndLastName(),
            ])
            ->add('owner_count', 'text', [
                'label' => 'Owner quantity',
                'rules' => new Integer(),
            ])
            ->add('comment', 'textarea', [
                'label' => 'Comment',
                'rules' => 'max:300',
                'error_messages' => [
                    'owner_quantity.max' => 'Comment length should only be 300 characters'
                ]
            ])
            ->add('Add New Truck', 'submit');
    }
}
