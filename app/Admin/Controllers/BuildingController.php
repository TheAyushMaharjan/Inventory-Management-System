<?php

namespace App\Admin\Controllers;

use App\Models\Building;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;

class BuildingController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Buildings';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Building());
        $grid->column('id', __('ID'));
        $grid->column('name', __('Building Name'));
        $grid->column('photo', __('Photo'));
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
        $show = new Show(Building::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('name', __('Building Name'));
        $show->field('photo', __('Photo'));
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



        $form = new Form(new Building());

        $form->text('name', __('Building Name'))
            ->icon('fa-bank')
            ->rules('required|min:3');

        $form->text('photo', __('Photo'));
        $form->textarea('detail', __('Details'));
        




        $form->footer(function ($footer) {
            // disable `View` checkbox
            $footer->disableViewCheck();

            // disable `Continue editing` checkbox
            $footer->disableEditingCheck();

        });
        return $form;
    }
}