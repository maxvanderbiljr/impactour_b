<?php

namespace App\Filament\Resources\Impacts;

use App\Filament\Resources\Impacts\Pages\CreateImpact;
use App\Filament\Resources\Impacts\Pages\EditImpact;
use App\Filament\Resources\Impacts\Pages\ListImpacts;
use App\Filament\Resources\Impacts\Pages\ViewImpact;
use App\Filament\Resources\Impacts\Schemas\ImpactForm;
use App\Filament\Resources\Impacts\Schemas\ImpactInfolist;
use App\Filament\Resources\Impacts\Tables\ImpactsTable;
use App\Models\Impact;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ImpactResource extends Resource
{
    protected static ?string $model = Impact::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $modelLabel = 'Impacto';
    protected static ?string $pluralModelLabel = 'Impactos';
    protected static ?string $recordTitleAttribute = 'nome';

    public static function canAccess(): bool
    {
        return auth()->user()->can('view impactos');
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (!auth()->user()->hasRole('admin')) {
            $query->where('user_id', auth()->id());
        }

        return $query;
    }

    public static function form(Schema $schema): Schema
    {
        return ImpactForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ImpactInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ImpactsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListImpacts::route('/'),
            'create' => CreateImpact::route('/create'),
            'view' => ViewImpact::route('/{record}'),
            'edit' => EditImpact::route('/{record}/edit'),
        ];
    }
}