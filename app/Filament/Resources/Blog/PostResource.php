<?php

namespace App\Filament\Resources\Blog;

use App\Filament\Resources\Blog\PostResource\Pages;
use App\Filament\Resources\Blog\PostResource\RelationManagers;
use App\Models\Blog\Post;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make()
                    ->tabs([
                        Tab::make('General')
                            ->schema([
                                TextInput::make('title')
                                    ->required(),
                                TextInput::make('slug')
                                    ->required()
                            ]),
                        Tab::make('Content')
                            ->schema([
                                Builder::make('content')
                                    ->blocks([
                                        ...static::getBuilderBlockForms(), 
                                        ...static::getBuilderBlockLayouts()
                                    ])
                            ])
                    ])
            ])
            ->columns(1);
    }

    protected static function getBuilderBlockForms(): array
    {
        return [
            Block::make('heading')
                ->schema([
                    TextInput::make('content')
                        ->label('Heading')
                        ->required(),
                    Select::make('level')
                        ->options([
                            'h1' => 'Heading 1',
                            'h2' => 'Heading 2',
                            'h3' => 'Heading 3',
                            'h4' => 'Heading 4',
                            'h5' => 'Heading 5',
                            'h6' => 'Heading 6',
                        ])
                        ->required(),
                ])
                ->icon('heroicon-s-hashtag')
                ->columns(2),
            Block::make('paragraph')
                ->schema([
                    Textarea::make('content')
                        ->label('Paragraph')
                        ->required(),
                ])
                ->icon('heroicon-s-bars-3-bottom-left'),
            Block::make('image')
                ->schema([
                    FileUpload::make('url')
                        ->label('Image')
                        ->image()
                        ->required(),
                    TextInput::make('alt')
                        ->label('Alt text')
                        ->required(),
                ])
                ->icon('heroicon-s-photo')
        ];
    }

    protected static function getBuilderBlockLayouts(): array
    {
        return [
            Block::make('2_columns')
                ->schema([
                    Builder::make('column_1')
                        ->schema(static::getBuilderBlockForms()),
                    Builder::make('column_2')
                        ->schema(static::getBuilderBlockForms())
                ])
                ->icon('heroicon-s-pause')
                ->columns(),
            Block::make('3_columns')
                ->schema([
                    Builder::make('column_1')
                        ->schema(static::getBuilderBlockForms()),
                    Builder::make('column_2')
                        ->schema(static::getBuilderBlockForms()),
                    Builder::make('column_3')
                        ->schema(static::getBuilderBlockForms())
                ])
                ->icon('heroicon-s-view-columns')
                ->columns(3)
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
