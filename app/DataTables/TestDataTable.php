<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TestDataTable extends DataTable
{
/**
* Build DataTable class.
*
* @param mixed $query Results from query() method.
* @return \Yajra\DataTables\DataTableAbstract
*/
public function dataTable($query)
{
return datatables()
->eloquent($query)
->addColumn('action', 'users.action')
->editColumn('created_at',function ($query){
    return $query->created_at->toDateTimeString();
})
->addColumn('image', function ($query){
    return '<img src="http://placekitten.com/200/300">' ;
})->rawColumns(['image','action']);
}

/**
* Get query source of dataTable.
*
* @param \App\Models\User $model
* @return \Illuminate\Database\Eloquent\Builder
*/
public function query(User $model)
{
return $model->newQuery()->with('city');
}

/**
* Optional method if you want to use html builder.
*
* @return \Yajra\DataTables\Html\Builder
*/
public function html()
{
return $this->builder()
->setTableId('users-table')
->columns($this->getColumns())
->minifiedAjax()
->dom('Bfrtip')
->orderBy(0)
->buttons(
Button::make('create'),
Button::make('export'),
Button::make('print'),
Button::make('reset'),
Button::make('reload')
);
}

/**
* Get columns.
*
* @return array
*/
protected function getColumns()
{
return [

Column::make('id')->title('user_id'),
Column::make('phone'),
Column::make('city.name')->title('city'),
Column::make('created_at'),
Column::computed('image'),
//Column::make('updated_at'),
Column::computed('action')
->exportable(false)
->printable(false)
->width(60)
->addClass('text-center'),
];
}

}
