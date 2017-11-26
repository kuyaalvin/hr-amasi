<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use App\Models\Project;

class ProjectsDataTable extends DataTable
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
        ->addColumn('edit', function(Project $project) {
            return '<a href="' . url('projects/' . $project->project_id . '/edit') . '">Edit</a>';
        })
        ->addColumn('delete', function(Project $project) {
            return '<form action="' . url('projects/' . $project->project_id) . '" method="post">'
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
     * @param \App\Models\Project $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Project $model)
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
            'address',
            'time_in',
            'time_out'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'projectsdatatable_' . time();
    }
}
