<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Organizers;

class OrganizersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Organizers';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Organizers());

        $grid->column('id', __('Id'));
        $grid->column('Organizer ID', __('Organizer ID'));
        $grid->column('Organizer Name', __('Organizer Name'));
        $grid->column('Contact Info', __('Contact Info'));
        $grid->column('Rating', __('Rating'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Organizers::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('Organizer ID', __('Organizer ID'));
        $show->field('Organizer Name', __('Organizer Name'));
        $show->field('Contact Info', __('Contact Info'));
        $show->field('Rating', __('Rating'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Organizers());

        $form->text('Organizer ID', __('Organizer ID'));
        $form->text('Organizer Name', __('Organizer Name'));
        $form->text('Contact Info', __('Contact Info'));
        $form->text('Rating', __('Rating'));

        return $form;
    }
}
