<?php

namespace App\Filament\Resources\Blog\PostResource\RelationManagers;

use App\Filament\Resources\Blog\TagResource;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Actions\DetachBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TagsRelationManager extends RelationManager
{
    protected static string $relationship = 'tags';

    public function form(Form $form): Form
    {
        return TagResource::form($form);
    }

    public function table(Table $table): Table
    {
        return TagResource::table($table)
            ->modifyQueryUsing(fn (Builder $query) => $query->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]))
            ->recordTitleAttribute('name')
            ->headerActions([
                CreateAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['order'] = $this->getRelationship()->count() + 1;
                
                        return $data;
                    }),
                AttachAction::make()
                    ->preloadRecordSelect()
                    ->recordSelectSearchColumns(['name', 'description'])
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['order'] = $this->getRelationship()->count() + 1;
                
                        return $data;
                    })
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                RestoreAction::make()
            ])
            ->bulkActions([
                DetachBulkAction::make(),
            ])
            ->reorderable('order');
    }
}
