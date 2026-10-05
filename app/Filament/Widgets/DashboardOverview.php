<?php

namespace App\Filament\Widgets;

use App\Models\Facility;
use App\Models\HouseType;
use App\Models\Lead;
use App\Models\Testimonial;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardOverview extends StatsOverviewWidget
{
    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        $newLeadsCount = Lead::where('status', 'new')->count();

        return [
            Stat::make('Leads Baru', $newLeadsCount)
                ->description('Belum dihubungi')
                ->descriptionIcon(Heroicon::OutlinedInboxArrowDown)
                ->color($newLeadsCount > 0 ? 'warning' : 'success'),

            Stat::make('Total Leads', Lead::count())
                ->description('Semua pesan masuk dari form kontak')
                ->descriptionIcon(Heroicon::OutlinedUsers)
                ->color('primary'),

            Stat::make('Tipe Rumah', HouseType::count())
                ->description('Aktif ditampilkan di landing page')
                ->descriptionIcon(Heroicon::OutlinedHome)
                ->color('gray'),

            Stat::make('Fasilitas', Facility::count())
                ->description('Aktif ditampilkan di landing page')
                ->descriptionIcon(Heroicon::OutlinedSquares2x2)
                ->color('gray'),

            Stat::make('Testimoni', Testimonial::count())
                ->description('Aktif ditampilkan di landing page')
                ->descriptionIcon(Heroicon::OutlinedChatBubbleLeftRight)
                ->color('gray'),
        ];
    }
}
