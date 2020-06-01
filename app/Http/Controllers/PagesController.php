<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Truck;
use DB;
use App\Truck_Brand;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use App\Forms\TruckForm;

class PagesController extends Controller
{
    use FormBuilderTrait;
    
    public function index(FormBuilder $formBuilder)
    { 
        $brands = Truck_Brand::all();
        $trucks = Truck::all();
        
        $form = $formBuilder->create(\App\Forms\TruckForm::class, [
            'method' => 'POST',
            'url' => route('truck.store')
        ]);

        return view('welcome')->with(compact('trucks', 'form'));
    }

    public function sort(FormBuilder $formBuilder, $sort_type)
    { 
        if($sort_type == "brand_d"){

            $trucks = Truck::join('truck_brands', 'brand', '=', 'truck_brands.id')
            ->select('brand', 'year_made', 'full_name', 'owner_count', 'comment')
            ->orderBy('truck_brands.name', 'DESC')
            ->get();

        } else if($sort_type == "year_d"){
            $trucks = Truck::orderByRaw('year_made DESC')->get();
        } else if($sort_type == "name_d"){
            $trucks = Truck::orderByRaw('full_name DESC')->get();
        } else if($sort_type == "ownerc_d"){
            $trucks = Truck::orderByRaw('owner_count DESC')->get();
        } else{
            $trucks = Truck::all();
        }

        if($sort_type == "brand_a"){

            $trucks = Truck::join('truck_brands', 'brand', '=', 'truck_brands.id')
            ->select('brand', 'year_made', 'full_name', 'owner_count', 'comment')
            ->orderBy('truck_brands.name', 'ASC')
            ->get();

        } else if($sort_type == "year_a"){
            $trucks = Truck::orderByRaw('year_made ASC')->get();
        } else if($sort_type == "name_a"){
            $trucks = Truck::orderByRaw('full_name ASC')->get();
        } else if($sort_type == "ownerc_a"){
            $trucks = Truck::orderByRaw('owner_count ASC')->get();
        }
        
        $form = $formBuilder->create(\App\Forms\TruckForm::class, [
            'method' => 'POST',
            'url' => route('truck.store')
        ]);

        return view('welcome')->with(compact('trucks', 'form'));
    }

    public function store(Request $request)
    {
        $form = $this->form(\App\Forms\TruckForm::class);

        // It will automatically use current request, get the rules, and do the validation
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        // Or automatically redirect on error. This will throw an HttpResponseException with redirect
        $form->redirectIfNotValid();

        Truck::create($form->getFieldValues());
        return redirect()->back();
    }


}
