<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Supplier;

class SupplierTable extends DataTableComponent
{
    protected $model = Supplier::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('supplierName', 'asc');

        $this->setTheadAttributes([
            'default' => false,
            'class' => 'bg-green-600',
        ]);

        $this->setThAttributes(function(Column $column) {
            if ($column) {
              return [
                'default' => true,
                'class' => 'text-white',
              ];
            }
         
            return [];
          })->setThSortButtonAttributes(function(Column $column) {
            if ($column) {
                return [
                'default' => true,
                'class' => 'text-white',
                ];
            }
            
            return [];
            });
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Supplier Name", 'supplierName')
                ->sortable()
                ->searchable(),
            Column::make("Supplier Address", 'supplierAddress')
                ->sortable()
                ->searchable(),
            Column::make("Contact Number", 'supplierContactNumber')
                ->sortable()
                ->searchable(),
            Column::make('Actions')
                ->label(
                    fn ($row, Column $column) => view('components.action-buttons')->with([
                        'viewLink' => '#',
                    ])
                )->html(),
        ];
    }
}
