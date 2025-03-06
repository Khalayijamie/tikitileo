<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Ticket;

class TicketController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Ticket';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Ticket());

        $grid->column('id', __('Id'));
        $grid->column('Ticket Id', __('Ticket Id'));
        $grid->column('Event Name', __('Event Name'));
        $grid->column('User ID', __('User ID'));
        $grid->column('Purchase Date', __('Purchase Date'));
        $grid->column('Payment Status', __('Payment Status'));
        $grid->column('Payment Method', __('Payment Method'));
        $grid->column('Installment Plan', __('Installment Plan'));
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
        $show = new Show(Ticket::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('Ticket Id', __('Ticket Id'));
        $show->field('Event Name', __('Event Name'));
        $show->field('User ID', __('User ID'));
        $show->field('Purchase Date', __('Purchase Date'));
        $show->field('Payment Status', __('Payment Status'));
        $show->field('Payment Method', __('Payment Method'));
        $show->field('Installment Plan', __('Installment Plan'));
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
        $form = new Form(new Ticket());

        $form->text('Ticket Id', __('Ticket Id'));
        $form->text('Event Name', __('Event Name'));
        $form->text('User ID', __('User ID'));
        $form->text('Purchase Date', __('Purchase Date'));
        $form->text('Payment Status', __('Payment Status'));
        $form->text('Payment Method', __('Payment Method'));
        $form->text('Installment Plan', __('Installment Plan'));

        return $form;
    }
}
