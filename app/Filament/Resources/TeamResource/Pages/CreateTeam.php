<?php

namespace App\Filament\Resources\TeamResource\Pages;

use App\Filament\Resources\TeamResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateTeam extends CreateRecord
{
    protected static string $resource = TeamResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Team Created';
    }

    protected function getCreatedNotification(): ?Notification
    {
        // to prevent showing the notification, return null
        // return null;

        // to show a notification with a custom title and body, return a new Notification
        return Notification::make()
        ->success()
        ->title('Team Created')
        ->body('The team has been created.');
    }
}
