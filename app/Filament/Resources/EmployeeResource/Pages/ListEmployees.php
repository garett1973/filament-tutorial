<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use App\Models\Employee;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ListEmployees extends ListRecords
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'All' => Tab::make(),
            'This week' => Tab::make()
                ->query(function (Builder $query) {
                    $query->where('date_hired', '>=', Carbon::now()->startOfWeek())
                        ->where('date_hired', '<=', Carbon::now()->endOfWeek());
                })
                ->badge(Employee::query()->where('date_hired', '>=', Carbon::now()->startOfWeek())
                    ->where('date_hired', '<=', Carbon::now()->endOfWeek())->count()),
            'This month' => Tab::make()
                ->query(function (Builder $query) {
                    $query->where('date_hired', '>=', Carbon::now()->startOfMonth())
                        ->where('date_hired', '<=', Carbon::now()->endOfMonth());
                })
                ->badge(Employee::query()->where('date_hired', '>=', Carbon::now()->startOfMonth())
                    ->where('date_hired', '<=', Carbon::now()->endOfMonth())->count()),
        ];
    }
}
