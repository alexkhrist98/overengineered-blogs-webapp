<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\MainPageSectionResource\Pages;
use App\Filament\Admin\Resources\MainPageSectionResource\Forms\LinkWithTextBlockForm;
use App\Filament\Admin\Resources\MainPageSectionResource\Forms\TextBlockWithSliderForm;
use App\Filament\Admin\Resources\MainPageSectionResource\RelationManagers;
use App\Enums\MainPageSectionTypeEnum;
use App\Models\MainPageSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MainPageSectionResource extends Resource
{
    public static function getLabel(): string
    {
        return __('admin.items.main_page_section');
    }

    public static function getPluralLabel(): string
    {
        return __('admin.items.main_page_sections');
    }
    protected static ?string $model = MainPageSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('Заголовок блока')
                ->required(),
            Forms\Components\Checkbox::make('is_active')
                ->label('Блок активен')
                ->default(false),
            Forms\Components\TextInput::make('sort')
                ->integer()
                ->label('Сортировка')
                ->default(100),
            Forms\Components\Select::make('type')
                ->label('Тип блока')
                ->options(MainPageSectionTypeEnum::forAdminPanel())
                ->required()
                ->live(),
            Forms\Components\Section::make('Содержимое блока')
                ->label('Содержимое')
                ->schema(
                    function ($get) {
                        return match ($get('type')) {
                            MainPageSectionTypeEnum::TEXT_BLOCK_WITH_SLIDER->value => TextBlockWithSliderForm::schema(),
                            MainPageSectionTypeEnum::LINK_WITH_TEXT_BLOCK->value => LinkWithTextBlockForm::schema(),
                            default => [],
                        };
                    }
                )
                ->visible(fn($get, $record) => (bool) $get('type') || $record?->type)
        ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListMainPageSections::route('/'),
            'create' => Pages\CreateMainPageSection::route('/create'),
            'edit' => Pages\EditMainPageSection::route('/{record}/edit'),
        ];
    }

    private function getSchemaFromRecord(): array
    {
        return match ($this->record?->type) {
            MainPageSectionTypeEnum::LINK_WITH_TEXT_BLOCK => LinkWithTextBlockForm::schema(),
            MainPageSectionTypeEnum::TEXT_BLOCK_WITH_SLIDER => TextBlockWithSliderForm::schema(),
            default => [],
        };
    }
}
