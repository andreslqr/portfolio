<?php

namespace App\Filament\Pages;

use App\Filament\Pages\Concerns\Translatable;
use App\Settings\CVSettings;
use Filament\Actions\LocaleSwitcher;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class OnlineCV extends SettingsPage
{
    use Translatable;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationLabel = 'Online CV';

    protected static ?string $title = 'Online CV';

    protected static ?string $navigationGroup = 'General';

    protected static string $settings = CVSettings::class;

    protected function getActions(): array
    {
        return [
            LocaleSwitcher::make()
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make([
                        FileUpload::make('profilePicture')
                            ->required()
                            ->image()
                            ->directory('cv')
                            ->disk('public')
                            ->imageEditor()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('1:1')
                            ->avatar()
                            ->circleCropper(),
                        TextInput::make('name')
                            ->required()
                            ->string()
                            ->maxLength(255),
                        TextInput::make('lastName')
                            ->required()
                            ->string()
                            ->maxLength(255),
                        TextInput::make('role')
                            ->required()
                            ->string()
                            ->maxLength(255),
                        TextInput::make('location')
                            ->required()
                            ->string()
                            ->maxLength(255),
                        TextInput::make('emailContact')
                            ->required()
                            ->string()
                            ->email()
                            ->maxLength(255),
                        TextInput::make('numberContact')
                            ->nullable()
                            ->string()
                            ->maxLength(255),
                    ])
                    ->grow(false),
                    Section::make([
                        Tabs::make()
                            ->tabs([
                                
                                Tab::make('About me')
                                    ->schema([
                                        MarkdownEditor::make('description')
                                            ->required()
                                            ->string(),
                                        Repeater::make('skills')
                                            ->schema([
                                                TextInput::make('name')
                                                        ->required(),
                                                ColorPicker::make('color')
                                                        ->required(),
                                                TextInput::make('value')
                                                        ->suffix('/ 100')
                                                        ->numeric()
                                                        ->minValue(1)
                                                        ->maxValue(100)
                                            ])
                                            ->columns(3),
                                        Repeater::make('softSkills')
                                            ->schema([
                                                TextInput::make('name')
                                                        ->required(),
                                                ColorPicker::make('color')
                                                        ->required()
                                            ])
                                            ->grid(2)
                                            ->columns(2)
                                                
                                    ]),
                                    Tab::make('Links')
                                    ->schema([
                                        Repeater::make('socialLinks')
                                            ->schema([
                                                FileUpload::make('logo')
                                                    ->required()
                                                    ->image()
                                                    ->directory('cv')
                                                    ->disk('public')
                                                    ->imageEditor()
                                                    ->imageResizeMode('cover')
                                                    ->imageResizeTargetWidth('200')
                                                    ->imageResizeTargetHeight('200')
                                                    ->imageCropAspectRatio('1:1'),
                                                TextInput::make('url')
                                                    ->required()
                                                    ->string()
                                                    ->url(),
                                                ]),
                                        Repeater::make('extraLinks')
                                            ->schema([
                                                FileUpload::make('logo')
                                                    ->required()
                                                    ->image()
                                                    ->directory('cv')
                                                    ->disk('public')
                                                    ->imageEditor()
                                                    ->imageResizeMode('cover')
                                                    ->imageResizeTargetWidth('200')
                                                    ->imageResizeTargetHeight('200')
                                                    ->imageCropAspectRatio('1:1'),
                                                TextInput::make('url')
                                                    ->required()
                                                    ->string()
                                                    ->url(),
                                            ])
                                    ]),
                                Tab::make('Work experience')
                                    ->schema([
                                        Repeater::make('workExperience')
                                            ->schema([
                                                Grid::make()
                                                ->schema([
                                                        FileUpload::make('logo')
                                                            ->image()
                                                            ->directory('cv')
                                                            ->disk('public')
                                                            ->imageEditor()
                                                            ->imageResizeMode('cover')
                                                            ->imageResizeTargetWidth('400')
                                                            ->imageResizeTargetHeight('200')
                                                            ->imageCropAspectRatio('2:1'),
                                                        TextInput::make('company')
                                                            ->required()
                                                            ->string()
                                                            ->maxLength(255)
                                                            ->live(onBlur: true),
                                                        DatePicker::make('start_at')
                                                            ->required(),
                                                        DatePicker::make('end_at')
                                                            ->nullable(),
                                                    ]),
                                                MarkdownEditor::make('description')
                                                    ->required()
                                                    ->string(),
                                                Repeater::make('roles')
                                                    ->schema([
                                                        TextInput::make('name')
                                                            ->required()
                                                            ->string()
                                                            ->maxLength(255)
                                                            ->live(onBlur: true),
                                                        Grid::make()
                                                            ->schema([
                                                                DatePicker::make('start_at')
                                                                    ->required(),
                                                                DatePicker::make('end_at')
                                                            ]),
                                                        MarkdownEditor::make('description')
                                                            ->required()
                                                            ->string(),
                                                    ])
                                                    ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
                                                    ->collapsible()
                                                    ->collapsed()
                                            ])
                                            ->itemLabel(fn (array $state): ?string => $state['company'] ?? null)
                                            ->collapsible()
                                            ->collapsed()
                                    ]),
                                Tab::make('Learning career')
                                    ->schema([
                                        Repeater::make('schoolCareer')
                                            ->schema([
                                                Grid::make()
                                                ->schema([
                                                    FileUpload::make('logo')
                                                        ->image()
                                                        ->directory('cv')
                                                        ->disk('public')
                                                        ->imageEditor()
                                                        ->imageResizeMode('cover')
                                                        ->imageResizeTargetWidth('200')
                                                        ->imageResizeTargetHeight('200')
                                                        ->imageCropAspectRatio('1:1'),
                                                    TextInput::make('school')
                                                        ->required()
                                                        ->string()
                                                        ->maxLength(255)
                                                        ->live(onBlur: true),
                                                    MarkdownEditor::make('description')
                                                        ->required()
                                                        ->string()
                                                        ->columnSpan(2),
                                                    DatePicker::make('start_at')
                                                        ->required(),
                                                    DatePicker::make('end_at')
                                                        ->nullable()
                                                ])
                                            ])
                                            ->itemLabel(fn (array $state): ?string => $state['school'] ?? null)
                                            ->collapsible()
                                            ->collapsed(),
                                        Repeater::make('certifications')
                                            ->schema([
                                                Grid::make()
                                                ->schema([
                                                    FileUpload::make('logo')
                                                        ->image()
                                                        ->directory('cv')
                                                        ->disk('public')
                                                        ->imageEditor()
                                                        ->imageResizeMode('cover')
                                                        ->imageResizeTargetWidth('200')
                                                        ->imageResizeTargetHeight('200')
                                                        ->imageCropAspectRatio('1:1'),
                                                    TextInput::make('name')
                                                        ->required()
                                                        ->string()
                                                        ->maxLength(255)
                                                        ->live(onBlur: true),
                                                    MarkdownEditor::make('description')
                                                        ->required()
                                                        ->string()
                                                        ->columnSpan(2),
                                                    TextInput::make('url')
                                                        ->nullable()
                                                        ->string()
                                                        ->url()
                                                        ->columnSpan(2),
                                                    DatePicker::make('start_at')
                                                        ->required(),
                                                    DatePicker::make('end_at')
                                                        ->nullable()
                                                ])
                                            ])
                                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
                                            ->collapsible()
                                            ->collapsed()
                                    ]),
                            ])
                    ])
                ])
                ->from('lg')
            ])
            ->columns(1);
    }
}
