<?php

namespace App\Filament\Resources\Communities\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class CommunitiesTable
{
   public static function configure(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('nome')
                ->label('Nome')
                ->searchable()
                ->sortable(),

            TextColumn::make('descricao')
                ->label('Descrição')
                ->searchable()
                ->sortable(),

            SpatieMediaLibraryImageColumn::make('image')
                ->label('Imagem')
                ->collection('comunidades')
                ->conversion('thumb')
                ->size(60)
                ->square(),
        ])
        ->filters([
            TrashedFilter::make(),
        ])
        ->recordActions([
            ViewAction::make()
                ->button()
                ->color('info')
                ->visible(fn() => auth()->user()->can('view comunidades')), // Só se tiver permissão

            EditAction::make()
                ->button()
                ->color('warning')
                ->visible(fn() => auth()->user()->can('edit comunidades')), // Só se tiver permissão

            DeleteAction::make()
                ->button()
                ->color('danger')
                ->successNotification(
                    Notification::make()
                        ->title('Comunidade Eliminada')
                        ->body('A comunidade foi eliminada com sucesso!.')
                        ->success()
                )
                ->visible(fn() => auth()->user()->can('delete comunidades')), // Só se tiver permissão
        ])
        ->toolbarActions([
            BulkActionGroup::make([
                DeleteBulkAction::make()
                    ->visible(fn() => auth()->user()->can('delete comunidades')),

                ForceDeleteBulkAction::make()
                    ->visible(fn() => auth()->user()->can('delete comunidades')),

                RestoreBulkAction::make()
                    ->visible(fn() => auth()->user()->can('edit comunidades')), 
            ]),
        ]);
    }
}