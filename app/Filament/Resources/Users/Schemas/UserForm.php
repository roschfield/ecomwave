<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Resources\Pages\CreateRecord;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->unique(ignoreRecord:true)
                    ->maxLength(255)
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at')
                     ->label('Email verified at')
                     ->default(now()),
                TextInput::make('password')
                    ->password()
                    ->dehydrated(fn($state)=>filled($state))
                    ->required(fn(Page $livewire):bool=>$livewire instanceof CreateRecord),
            ]);
    }
}