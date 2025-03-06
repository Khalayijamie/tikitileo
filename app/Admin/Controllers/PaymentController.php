<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Payment;

class PaymentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Payment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Payment());

        $grid->column('id', __('Id'));
        $grid->column('Payment ID', __('Payment ID'));
        $grid->column('User ID', __('User ID'));
        $grid->column('Ticket ID', __('Ticket ID'));
        $grid->column('Amount', __('Amount'));
        $grid->column('Payment Date', __('Payment Date'));
        $grid->column('Payment Method', __('Payment Method'));
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
        $show = new Show(Payment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('Payment ID', __('Payment ID'));
        $show->field('User ID', __('User ID'));
        $show->field('Ticket ID', __('Ticket ID'));
        $show->field('Amount', __('Amount'));
        $show->field('Payment Date', __('Payment Date'));
        $show->field('Payment Method', __('Payment Method'));
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
        $form = new Form(new Payment());

        $form->text('Payment ID', __('Payment ID'));
        $form->text('User ID', __('User ID'));
        $form->text('Ticket ID', __('Ticket ID'));
        $form->text('Amount', __('Amount'));
        $form->text('Payment Date', __('Payment Date'));
        $form->text('Payment Method', __('Payment Method'));
        $form->text('Status', __('Status'));

        return $form;
    }
}
