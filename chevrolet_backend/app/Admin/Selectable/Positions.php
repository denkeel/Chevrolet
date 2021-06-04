<?php


namespace App\Admin\Selectable;

use App\Models\Position;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Selectable;

class Positions extends Selectable
{
    public $model = Position::class;

    public function make()
    {
        $this->column('id');
        $this->column('job');
        $this->column('created_at');

        $this->filter(function (Filter $filter) {
            $filter->like('job');
        });
    }
}
