<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditEmployee extends EditRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title($this->getSavedNotificationTitle())
            ->body($this->getSavedNotificationMessage());
    }
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Employee profile updated successfully.';
    }

    protected function getSavedNotificationMessage(): ?string
    {
        return 'Employee profile for ' . $this->record->first_name . ' ' . $this->record->last_name . ' has been updated successfully.';
    }
}
