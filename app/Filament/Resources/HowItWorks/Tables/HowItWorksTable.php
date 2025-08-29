<?php

namespace App\Filament\Resources\HowItWorks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Filament\Actions\RestoreBulkAction;

class HowItWorksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('etapa')
                    ->label('Etapa')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('titulo')
                    ->label('Título')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('descricao')
                    ->label('Descrição')
                    ->limit(50),
                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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