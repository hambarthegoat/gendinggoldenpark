<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManageSiteSettings extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected string $view = 'filament.pages.manage-site-settings';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?string $navigationLabel = 'Pengaturan Situs';

    protected static ?string $title = 'Pengaturan Situs';

    /**
     * @var array<string, mixed>
     */
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(SiteSetting::current()->toArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Section::make('Hero')
                    ->description('Teks utama yang tampil paling atas di landing page.')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('hero_image')
                            ->label('Gambar Hero')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('hero')
                            ->nullable()
                            ->helperText('Opsional. Rasio terbaik 4:5 (potret). Jika kosong, ilustrasi bawaan dipakai.')
                            ->columnSpanFull(),
                        TextInput::make('hero_badge')
                            ->label('Teks Badge')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('hero_headline_prefix')
                            ->label('Headline — bagian awal'),
                        TextInput::make('hero_headline_highlight')
                            ->label('Headline — bagian disorot (gold)'),
                        Textarea::make('hero_subtext')
                            ->label('Subteks')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('hero_cta_primary_label')
                            ->label('Label Tombol Utama'),
                        TextInput::make('hero_cta_secondary_label')
                            ->label('Label Tombol Sekunder'),
                        TextInput::make('hero_floating_title')
                            ->label('Judul Kartu Melayang'),
                        TextInput::make('hero_floating_desc')
                            ->label('Deskripsi Kartu Melayang'),
                    ]),

                Section::make('Kontak & Sosial Media')
                    ->description('Dipakai di navbar, footer, link WhatsApp, dan lokasi.')
                    ->columns(2)
                    ->schema([
                        TextInput::make('company_name')
                            ->label('Nama Perusahaan')
                            ->required(),
                        TextInput::make('company_tagline')
                            ->label('Tagline')
                            ->required(),
                        TextInput::make('whatsapp')
                            ->label('Nomor WhatsApp')
                            ->helperText('Format 62xxxxxxxxxx, tanpa + atau spasi.')
                            ->required(),
                        TextInput::make('phone_display')
                            ->label('Nomor Telepon (tampilan)')
                            ->required(),
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required(),
                        Textarea::make('address')
                            ->label('Alamat')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('maps_embed_src')
                            ->label('Google Maps Embed URL')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('instagram')
                            ->label('Instagram URL'),
                        TextInput::make('facebook')
                            ->label('Facebook URL'),
                        TextInput::make('tiktok')
                            ->label('TikTok URL'),
                    ]),
            ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        SiteSetting::current()->update($data);

        Notification::make()
            ->title('Pengaturan tersimpan')
            ->success()
            ->send();
    }
}
