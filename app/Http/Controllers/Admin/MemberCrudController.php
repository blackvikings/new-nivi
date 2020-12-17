<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MemberRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use http\Env\Request;

/**
 * Class MemberCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MemberCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Member::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/member');
        CRUD::setEntityNameStrings('member', 'members');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->setColumns(['user_id', 'name', 'phone_no', 'dob']);
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(MemberRequest::class);

        $this->crud->addField([
            'label' => 'Name',
            'name' => 'name',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'phone_no',
            'label' => 'Mobile No.',
            'type' => 'number'
        ]);

        $this->crud->addField([
            'name'  => 'dob',
            'label' => 'Date of birth',
            'type'  => 'date_picker',
            'date_picker_options' => [
                'todayBtn' => 'linked',
                'format'   => 'dd-mm-yyyy',
                'language' => 'en'
            ],
        ]);

        $this->crud->addField([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
        ]);

        $this->crud->addField([
            'name' => 'sponser_id',
            'label' => 'Sponser Id',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'sub_sponser_id',
            'label' => 'Sub-Sponser Id',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'left_or_right',
            'label' => 'Left or Right',
            'type' => 'select_from_array',
            'options' => ['left' => 'Left', 'right' => 'Right'],
            'default' => 'right',
        ]);

        $this->crud->addField([
            'name' => 'pin_no',
            'label' => 'Pin Number',
            'type' => 'number',
        ]);

        $this->crud->addField([
            'name' => 'user_id',
            'label' => 'User ID',
            'type' => 'user_id'
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
