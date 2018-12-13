<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SliderRequest as StoreRequest;
use App\Http\Requests\SliderRequest as UpdateRequest;

/**
 * Class SliderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SliderCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Slider');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/slider');
        $this->crud->setEntityNameStrings('slider', 'sliders');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $this->crud->addColumn([
                                'name' => 'name',
                                'label' => 'Label',
                            ]);
        $this->crud->addColumn([
                                'name' => 'image_url',
                                'label' => 'Image',
                                'type' => 'image'
                            ]);

        $this->crud->addField([
                                'name' => 'name',
                                'label' => 'Label',
                            ]);
        $this->crud->addField([
                                'name' => 'image_url',
                                'label' => 'Image Url',
                                'type' => 'image',
                                'upload' => true,
                                'crop' => true, // set to true to allow cropping, false to disable
                                'aspect_ratio' => 2,
                            ]);
        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in SliderRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
