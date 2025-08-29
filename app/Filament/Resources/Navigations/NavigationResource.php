<?php

namespace App\Filament\Resources\Navigations;

use App\Filament\Resources\Navigations\Pages\CreateNavigation;
use App\Filament\Resources\Navigations\Pages\EditNavigation;
use App\Filament\Resources\Navigations\Pages\ListNavigations;
use App\Filament\Resources\Navigations\Pages\ViewNavigation;
use App\Filament\Resources\Navigations\Schemas\NavigationForm;
use App\Filament\Resources\Navigations\Schemas\NavigationInfolist;
use App\Filament\Resources\Navigations\Tables\NavigationsTable;
use App\Models\Navigation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NavigationResource extends Resource
{
    protected static ?string $model = Navigation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $modelLabel = 'Menu';

    protected static ?string $pluralModelLabel = 'Menus';

    protected static ?string $recordTitleAttribute = 'nome';

    public static function form(Schema $schema): Schema
    {
        return NavigationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return NavigationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NavigationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListNavigations::route('/'),
            'create' => CreateNavigation::route('/create'),
            'view' => ViewNavigation::route('/{record}'),
            'edit' => EditNavigation::route('/{record}/edit'),
        ];
    }

    // public static function getRecordRouteBindingEloquentQuery(): Builder
    // {
    //     return parent::getRecordRouteBindingEloquentQuery()
    //         ->withoutGlobalScopes([
    //             SoftDeletingScope::class,
    //         ]);
    // }

    // /**
    //  * Exibe o menu "Menus" apenas para admin.
    //  */
    // public static function shouldRegisterNavigation(): bool
    // {
    //     $user = auth()->user();
    //     return $user->role === 'admin';
    // }

    // /**
    //  * Permite visualizar menus apenas para admin.
    //  */
    // public static function canViewAny(): bool
    // {
    //     $user = auth()->user();
    //     return $user->role === 'admin';
    // }

    // /**
    //  * Permite criar menus apenas para admin.
    //  */
    // public static function canCreate(): bool
    // {
    //     $user = auth()->user();
    //     return $user->role === 'admin';
    // }

    // /**
    //  * Permite editar menus apenas para admin.
    //  */
    // public static function canEdit($record): bool
    // {
    //     $user = auth()->user();
    //     return $user->role === 'admin';
    // }

    // /**
    //  * Permite excluir menus apenas para admin.
    //  */
    // public static function canDelete($record): bool
    // {
    //     $user = auth()->user();
    //     return $user->role === 'admin';
    // }
}
