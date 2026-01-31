<?php

namespace App\Filament\Resources\Portals;

use App\Models\Portal;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\Action;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\{
    TextInput,
    Select,
    RichEditor,
    FileUpload
};
class PortalResource extends Resource
{
    protected static ?string $model = Portal::class;
    protected static BackedEnum|string|null $navigationIcon = Heroicon::RectangleStack;
    protected static ?string $recordTitleAttribute = 'Judul';
    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('Judul')->required()->live(onBlur: true)->afterStateUpdated(fn ($state, callable $set) =>$set('slug', \Str::slug($state))),
            TextInput::make('slug')->required()->unique(ignoreRecord: true),
            Select::make('Kategori')
                ->options([
                    'ALAM' => 'Alam',
                    'BUDAYA' => 'Budaya',
                    'BERDAYA' => 'Berdaya',
                    'SUARA' => 'Suara',
                ])->required(),
            FileUpload::make('Gambar')->image()->disk('public')->directory('portal')->imagePreviewHeight('150')->visibility('public')->preserveFilenames()->required()->saveUploadedFileUsing(function ($file) {return $file->storeAs('portal', str()->random(40) . '.webp', 'public');
    }),
            FileUpload::make('foto_penulis')->image()->dehydrated(true)->directory('penulis')->disk('public')->visibility('public')->saveUploadedFileUsing(function ($file) {
        return $file->storeAs('portal', str()->random(40) . '.webp', 'public');
    }),
            TextInput::make('Penulis')->default('Redaksi Mayung Media'),
            TextInput::make('Quote')->default('Tim Editor Mayung Media'),
            RichEditor::make('Konten')->columnSpanFull(),
        ]);
    }
public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\ImageColumn::make('Gambar')->disk('public'),
            Tables\Columns\TextColumn::make('Judul')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('Kategori')->badge(),
            Tables\Columns\TextColumn::make('Quote')->label('apa yang ingin anda sampaikan?'),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Dibuat Pada'),
            Tables\Columns\ImageColumn::make('foto_penulis')->circular()
        ])
        ->actions([
            Action::make('edit')
                ->label('Edit')
                ->icon('heroicon-o-pencil')
                ->url(fn ($record) => static::getUrl('edit', ['record' => $record])),

            Action::make('delete')
                ->label('Hapus')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->requiresConfirmation()
                ->action(fn ($record) => $record->delete()),
        ]);
}
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPortals::route('/'),
            'create' => Pages\CreatePortal::route('/create'),
            'edit' => Pages\EditPortal::route('/{record}/edit'),
        ];
    }
    public function getAuthorImageAttribute()
    {
    if ($this->foto_penulis) {
        return asset('storage/' . $this->foto_penulis);
    }
    return asset('img/author.webp');
    }
}