<?php

namespace App\Filament\CodeCraft\Resources\EmployeeResource\Pages;

use App\Filament\CodeCraft\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;
}
