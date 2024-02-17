<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\AutoSupply;

class AutoSupplyTable extends DataTableComponent
{
    protected $model = AutoSupply::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
             ->setDefaultSort('itemName', 'asc');

        $this->setTheadAttributes([
            'default' => false,
            'class' => 'bg-gray-800',
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
                ->hideIf(true),
            Column::make("Item Name", "itemName")
                ->sortable()
                ->searchable(),
            Column::make("Item Quantity", "itemQuantity")
                ->sortable()
                ->searchable(),
            Column::make("Unit Price", "unitPrice")
                ->sortable()
                ->searchable()
                ->format(function($value){
                    return '₱ '.$value;
                }),
            Column::make('Actions')
                ->label(
                    fn ($row, Column $column) => view('components.action-buttons')->with([
                        'viewLink' => route('view-item', $row->id),
                    ])
                )->html(),
        ];
    }
}
