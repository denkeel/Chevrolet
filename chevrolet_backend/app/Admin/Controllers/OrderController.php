<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('client_id', __('Client id'));
        $grid->column('start_time', __('Start time'));
        $grid->column('vin_code', __('Vin code'));
        $grid->column('end_time', __('End time'));
        $grid->column('description', __('Description'));
        $grid->column('completed_work', __('Completed work'));
        $grid->column('status', __('Status'));
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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('client_id', __('Client id'));
        $show->field('start_time', __('Start time'));
        $show->field('vin_code', __('Vin code'));
        $show->field('end_time', __('End time'));
        $show->field('description', __('Description'));
        $show->field('completed_work', __('Completed work'));
        $show->field('status', __('Status'));
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
        $form = new Form(new Order());

        $form->number('user_id', __('User id'));
        $form->number('client_id', __('Client id'));
        $form->datetime('start_time', __('Start time'))->default(date('Y-m-d H:i:s'));
        $form->textarea('vin_code', __('Vin code'));
        $form->datetime('end_time', __('End time'))->default(date('Y-m-d H:i:s'));
        $form->textarea('description', __('Description'));
        $form->textarea('completed_work', __('Completed work'));
        $form->text('status', __('Status'))->default('active');

        return $form;
    }
}
