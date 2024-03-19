<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubmissionResource\Pages;
use App\Models\Submission;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Log;

class SubmissionResource extends Resource
{
    protected static ?string $model = Submission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')->sortable(),
                Tables\Columns\TextColumn::make('last_name')->sortable(),
                Tables\Columns\TextColumn::make('email')->sortable(),
                Tables\Columns\TextColumn::make('ssn')->sortable(),
                Tables\Columns\IconColumn::make('is_enabled')->boolean()
                    ->action(
                        Tables\Actions\Action::make('select')
                            ->requiresConfirmation()
                            ->action(function (Submission $submission): void {
                                //Note: normally I would not include logic in a Resource like this, but the project is very small
                                $submission->is_enabled = !$submission->is_enabled;
                                $submission->save();
                            })
                            ->modalDescription("Are you sure you would like to toggle this Submission?")
                            ->modalHeading("Toggle Submission?"),
                    ),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubmissions::route('/'),
            'create' => Pages\CreateSubmission::route('/create'),
            'edit' => Pages\EditSubmission::route('/{record}/edit'),
        ];
    }
}
