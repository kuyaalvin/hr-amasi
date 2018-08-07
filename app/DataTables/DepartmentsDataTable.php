<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;;
use App\Models\Department;

class DepartmentsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Department $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Department $model)
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
                    ->minifiedAjax()
//                    ->addAction(['width' => '80px', 'title' => 'Edit'])
//                    ->addAction(['width' => '80px', 'title' => 'Delete'])
        ->parameters($this->getBuilderParameters());
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'departmentsdatatable_' . time();
    }
}
