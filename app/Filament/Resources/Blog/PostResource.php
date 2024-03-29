<?php

namespace App\Filament\Resources\Blog;

use App\Filament\Resources\Blog\PostResource\Pages;
use App\Filament\Resources\Blog\PostResource\RelationManagers\TagsRelationManager;
use App\Models\Blog\Post;
use App\Models\Scopes\IsPublishedScope;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    use Translatable;
    
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    protected static ?string $navigationGroup = 'Blog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make()
                    ->tabs([
                        Tab::make('General')
                            ->schema([
                                TextInput::make('title')
                                ->live(onBlur: true, debounce: '1s')
                                ->afterStateUpdated(function (Get $get, Set $set, ?string $operation, ?string $old, ?string $state) {
 
                                    if ($operation == 'edit') {
                                        return;
                                    }
                                 
                                    if (($get('slug') ?? '') !== Str::slug($old)) {
                                        return;
                                    }
                                 
                                    $set('slug', Str::slug($state));
                                })
                                    ->required()
                                    ->string()
                                    ->maxLength(255)
                                    ->columnSpan(3),
                                TextInput::make('slug')
                                    ->required()
                                    ->string()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true)
                                    ->columnSpan(3),
                                Toggle::make('is_active')
                                    ->inline(false),
                                FileUpload::make('image')
                                    ->required()
                                    ->image()
                                    ->directory('posts')
                                    ->columnSpan(3)
                                    ->disk('public')
                                    ->imageEditor()
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('2:1'),
                                Textarea::make('short_description')
                                    ->required()
                                    ->columnSpan(4),
                                TextInput::make('author')
                                    ->default(fn() => filament()->auth()->user()->name)
                                    ->required()
                                    ->string()
                                    ->maxLength(255)
                                    ->columnSpan(3),
                                DateTimePicker::make('published_at')
                                    ->live()
                                    ->required()
                                    ->columnSpan(2),
                                Split::make([
                                    Checkbox::make('expires')
                                        ->live()
                                        ->default(true)
                                        ->inline(false),
                                    DateTimePicker::make('expired_at')
                                        ->live()
                                        ->visible(fn(Get $get) => $get('expires'))
                                        ->required()
                                        ->minDate(fn(Get $get) => $get('published_at'))

                                ])
                                ->columnSpan(2)

                            ])
                            ->columns(7),
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
                    MarkdownEditor::make('content')
                        ->label('Paragraph')
                        ->toolbarButtons([
                            'bold',
                            'bulletList',
                            'italic',
                            'link',
                            'orderedList',
                            'strike',
                        ])
                        ->required(),
                ])
                ->icon('heroicon-s-bars-3-bottom-left'),
            Block::make('image')
                ->schema([
                    FileUpload::make('content')
                        ->label('Image')
                        ->image()
                        ->required(),
                    TextInput::make('alt')
                        ->label('Alt text')
                        ->required(),
                ])
                ->icon('heroicon-s-photo'),
            Block::make('code')
                ->schema([
                    Select::make('language')
                        ->options([
                            'php' => 'php',
                            'html' => 'html',
                            'js' => 'js',
                            'css' => 'css',
                            'sql' => 'sql',
                            'bash' => 'bash'
                        ]),
                    MarkdownEditor::make('content')
                        ->toolbarButtons([])
                        ->required()
                ])
                ->icon('heroicon-s-code-bracket'),
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
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('author')
                    ->searchable(),
                IconColumn::make('is_published')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make()
                        ->url(fn(Post $record) => $record->getWebUrl(), shouldOpenInNewTab: true),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): EloquentBuilder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
                IsPublishedScope::class
            ]);
    }

    public static function getRelations(): array
    {
        return [
            TagsRelationManager::class
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
