<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Installments;

class InstallmentsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Installments';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Installments());

        $grid->column('id', __('Id'));
        $grid->column('Installment ID', __('Installment ID'));
        $grid->column('Ticket ID', __('Ticket ID'));
        $grid->column('Total Amt', __('Total Amt'));
        $grid->column('Installment type', __('Installment type'));
        $grid->column('Installment Amount', __('Installment Amount'));
        $grid->column('Due date', __('Due date'));
        $grid->column('Paid amount', __('Paid amount'));
        $grid->column('Payment status', __('Payment status'));
        $grid->column('Remaining Amount', __('Remaining Amount'));
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
        $show = new Show(Installments::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('Installment ID', __('Installment ID'));
        $show->field('Ticket ID', __('Ticket ID'));
        $show->field('Total Amt', __('Total Amt'));
        $show->field('Installment type', __('Installment type'));
        $show->field('Installment Amount', __('Installment Amount'));
        $show->field('Due date', __('Due date'));
        $show->field('Paid amount', __('Paid amount'));
        $show->field('Payment status', __('Payment status'));
        $show->field('Remaining Amount', __('Remaining Amount'));
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
        $form = new Form(new Installments());

        $form->text('Installment ID', __('Installment ID'));
        $form->text('Ticket ID', __('Ticket ID'));
        $form->text('Total Amt', __('Total Amt'));
        $form->text('Installment type', __('Installment type'));
        $form->text('Installment Amount', __('Installment Amount'));
        $form->text('Due date', __('Due date'));
        $form->text('Paid amount', __('Paid amount'));
        $form->text('Payment status', __('Payment status'));
        $form->text('Remaining Amount', __('Remaining Amount'));

        return $form;
    }
}
