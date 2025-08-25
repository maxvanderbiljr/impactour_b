<?php

namespace App\Filament\Resources\ExperienceHowItWorks;

use App\Filament\Resources\ExperienceHowItWorks\Pages\CreateExperienceHowItWorks;
use App\Filament\Resources\ExperienceHowItWorks\Pages\EditExperienceHowItWorks;
use App\Filament\Resources\ExperienceHowItWorks\Pages\ListExperienceHowItWorks;
use App\Filament\Resources\ExperienceHowItWorks\Pages\ViewExperienceHowItWorks;
use App\Filament\Resources\ExperienceHowItWorks\Schemas\ExperienceHowItWorksForm;
use App\Filament\Resources\ExperienceHowItWorks\Schemas\ExperienceHowItWorksInfolist;
use App\Filament\Resources\ExperienceHowItWorks\Tables\ExperienceHowItWorksTable;
use App\Models\ExperienceHowItWorks;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExperienceHowItWorksResource extends Resource
{
    protected static ?string $model = ExperienceHowItWorks::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nome';

    public static function form(Schema $schema): Schema
    {
        return ExperienceHowItWorksForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ExperienceHowItWorksInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExperienceHowItWorksTable::configure($table);
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
            'index' => ListExperienceHowItWorks::route('/'),
            'create' => CreateExperienceHowItWorks::route('/create'),
            'view' => ViewExperienceHowItWorks::route('/{record}'),
            'edit' => EditExperienceHowItWorks::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
