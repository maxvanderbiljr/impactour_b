<?php

namespace App\Filament\Resources\Experiences\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;

class ExperiencesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titulo')
                    ->label('Título')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('descricao')
                    ->label('Descrição')
                    ->limit(50),

                Tables\Columns\TextColumn::make('localizacao')
                    ->label('Localização'),

                Tables\Columns\TextColumn::make('data')
                    ->label('Data')
                    ->date(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
             ->recordActions([
                ViewAction::make()
                    ->button()
                    ->color('info'),

                EditAction::make()
                    ->button()
                    ->color('warning'),

                DeleteAction::make()
                    ->button()
                    ->color('danger')
                    ->successNotification(
                
                Notification::make()
                    ->title('Experiência Eliminada')
                    ->body('A experiência foi eliminada com sucesso!.')
                    ->success()
                    ),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
