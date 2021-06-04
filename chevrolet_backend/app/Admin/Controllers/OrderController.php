<?php

namespace App\Admin\Controllers;

use App\Admin\Selectable\Users;
use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{

    protected $title = 'Order';

    protected function grid(): Grid
    {


        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'))->belongsTo(Users::class);
        $grid->column('client_id', __('Client id'))->belongsTo(Users::class);
        $grid->column('start_time', __('Start time'));
        $grid->column('vin_code', __('Vin code'));
        $grid->column('end_time', __('End time'));
        $grid->column('description', __('Description'));
        $grid->column('completed_work', __('Completed work'));
        $grid->column('status', __('Status'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function($filter){
            $statusSelect = [];
            foreach (OrderStatus::STATUS as $status) {
                $statusSelect[$status] = $status;
            }

            // Remove the default id filter
            $filter->disableIdFilter();

            $filter->date('created_at', 'date create');
            $filter->equal('status')->select($statusSelect);

        });
        return $grid;
    }


    protected function detail($id): Show
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


    protected function form(): Form
    {
        $statusSelect = [];
        foreach (OrderStatus::STATUS as $status) {
            $statusSelect[$status] = $status;
        }

        $form = new Form(new Order());

//        $form->select('user_id', __('User id'))->options(User::all()->pluck('name', 'id')); // select
        $form->belongsTo('user_id', Users::class, 'Master');
        $form->number('client_id', __('Client id'));
        $form->datetime('start_time', __('Start time'))->default(date('Y-m-d H:i:s'));
        $form->textarea('vin_code', __('Vin code'));
        $form->datetime('end_time', __('End time'));
        $form->textarea('description', __('Description'));
        $form->textarea('completed_work', __('Completed work'));
        $form->select('status', __('Status'))->options($statusSelect);

        return $form;
    }
}
