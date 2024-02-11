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
        $this->setPrimaryKey('id');

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
                ->searchable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
