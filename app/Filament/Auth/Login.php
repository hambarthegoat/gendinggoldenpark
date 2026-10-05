<?php

namespace App\Filament\Auth;

use Filament\Auth\Pages\Login as BaseLogin;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;

class Login extends BaseLogin
{
    /**
     * Plain username login for this single-admin panel — the "email" column
     * just stores a short login name (e.g. "user"), not a real address, so
     * the usual email-format validation is dropped here.
     */
    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label('Username')
            ->required()
            ->autocomplete()
            ->autofocus();
    }
}
