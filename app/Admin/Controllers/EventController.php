<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Events;

class EventController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Events';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Events());

        $grid->column('id', __('Id'));
        $grid->column('Event Name', __('Event Name'));
        $grid->column('Description', __('Description'));
        $grid->column('Date and Time', __('Date and Time'));
        $grid->column('Location', __('Location'));
        $grid->column('Organizer', __('Organizer'));
        $grid->column('Ticket Price', __('Ticket Price'));
        $grid->column('Available Tickets', __('Available Tickets'));
        $grid->column('Status', __('Status'));
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
        $show = new Show(Events::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('Event Name', __('Event Name'));
        $show->field('Description', __('Description'));
        $show->field('Date and Time', __('Date and Time'));
        $show->field('Location', __('Location'));
        $show->field('Organizer', __('Organizer'));
        $show->field('Ticket Price', __('Ticket Price'));
        $show->field('Available Tickets', __('Available Tickets'));
        $show->field('Status', __('Status'));
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
        $form = new Form(new Events());

        $form->text('Event Name', __('Event Name'));
        $form->text('Description', __('Description'));
        $form->text('Date and Time', __('Date and Time'));
        $form->text('Location', __('Location'));
        $form->text('Organizer', __('Organizer'));
        $form->text('Ticket Price', __('Ticket Price'));
        $form->text('Available Tickets', __('Available Tickets'));
        $form->text('Status', __('Status'));

        return $form;
    }
}
