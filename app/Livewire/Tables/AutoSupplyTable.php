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
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("ItemName", "itemName")
                ->sortable()
                ->searchable(),
            Column::make("ItemQuantity", "itemQuantity")
                ->sortable()
                ->searchable(),
            Column::make("UnitPrice", "unitPrice")
                ->sortable()
                ->searchable()
                ->format(function($value){
                    return '₱ '.$value;
                }),
            Column::make('Action')
                ->label(
                    fn ($row, Column $column) => view('components.action-buttons')->with([
                        'viewLink' => route('users.view', $row),
                        'editLink' => route('users.edit', $row),
                        'deleteLink' => route('users.delete', $row),
                    ])
                )->html(),
        ];
    }
}
