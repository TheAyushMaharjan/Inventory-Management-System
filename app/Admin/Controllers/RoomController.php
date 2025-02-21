<?php

namespace App\Admin\Controllers;

use App\Models\Room;
use App\Models\User;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Company;
use App\Models\Building;
use Illuminate\Support\Facades\DB;
use Encore\Admin\Controllers\AdminController;

class RoomController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Rooms';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Room());

        
        $grid->column('id', __('Id'));
        $grid->column('name', __('Room Number'));
        $grid->column('price', __('Price'));
        $grid->column('availability', __('Availability'));
        $grid->column('services', __('Services'));
        $grid->column('detail', __('Details'));
         

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Room::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('name', __('Name'));
        $show->field('availability', __('Availability'));
        $show->field('price', __('Price'));
        $show->field('services', __('Services'));
        $show->field('detail', __('Details'));
        

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {

        $form = new Form(new Room());
        $form->text('name', __('Room Number'))
            ->icon('fa-bank')
            ->rules('required|min:3');

        $form->radioCard('availability', __('Availability'))
            ->options([
                'Available' => 'Available',
                'Not Available' => 'Not Available',  
            ])->rules('required');

            //display building tables data also create table to use this
            $building = Building::all()->pluck('name','id');
            $form->select('building_id','Select Building')
            ->options($building);

        $form->number('price', __('Price'));
        $form->textarea('services', __('Services'));
        $form->textarea('detail', __('Detail'));




        $form->footer(function ($footer) {
            // disable `View` checkbox
            $footer->disableViewCheck();

            // disable `Continue editing` checkbox
            $footer->disableEditingCheck();

        });
        return $form;
    }
}