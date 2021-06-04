<?php

namespace App\Admin\Controllers;

use App\Admin\Selectable\Positions;
use App\Models\Position;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{

    protected $title = 'User';


    protected function grid(): Grid
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('email_verified_at', __('Email verified at'));
        $grid->column('password', __('Password'));
        $grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('last_name', __('Last name'));
        $grid->column('position_id', __('Position id'))->belongsTo(Positions::class);

        return $grid;
    }

    protected function detail($id): Show
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('Password'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('last_name', __('Last name'));
        $show->field('position_id', __('Position id'));

        return $show;
    }


    protected function form(): Form
    {

        $form = new Form(new User());

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', ('Password'));
        $form->text('last_name', __('Last name'));
//        $form->number('position_id', __('Position id'));
        $form->belongsTo('position_id', Positions::class,'placeholder...');

        return $form;
    }
}
