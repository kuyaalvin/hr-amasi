<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;;
use App\Models\Position;

class PositionsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('edit', function(Position $position) {
                return '<a href="' . url('positions/' . $position->position_id . '/edit') . '">Edit</a>';
            })
            ->addColumn('delete', function(Position $position) {
                return '<form action="' . url('positions/' . $position->position_id) . '" method="post">'
                . csrf_field()
                . method_field('delete')
                . '<input type="submit" value="Delete">
</form>';
            })
            ->rawColumns(['edit', 'delete']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Position $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Position $model)
    {
        return $model->query();
    }
    
    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px', 'title' => 'Edit'])
                    ->addAction(['width' => '80px', 'title' => 'Delete'])
        ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'name',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'positionsdatatable_' . time();
    }
}
