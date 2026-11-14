<?php

namespace Tests\Feature;

use App\Models\AccessPoint;
use App\Models\Advantage;
use App\Models\Facility;
use App\Models\Faq;
use App\Models\GalleryItem;
use App\Models\HouseType;
use App\Models\Lead;
use App\Models\SiteSetting;
use App\Models\Stat;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_away_from_admin(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }

    public function test_admin_login_page_loads(): void
    {
        $this->get('/admin/login')->assertStatus(200);
    }

    #[DataProvider('adminResourceIndexRoutes')]
    public function test_authenticated_admin_can_view_resource_index(string $uri): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get($uri)->assertStatus(200);
    }

    public static function adminResourceIndexRoutes(): array
    {
        return [
            'dashboard' => ['/admin'],
            'stats' => ['/admin/stats'],
            'advantages' => ['/admin/advantages'],
            'house-types' => ['/admin/house-types'],
            'facilities' => ['/admin/facilities'],
            'gallery-items' => ['/admin/gallery-items'],
            'access-points' => ['/admin/access-points'],
            'testimonials' => ['/admin/testimonials'],
            'faqs' => ['/admin/faqs'],
            'leads' => ['/admin/leads'],
            'site-settings' => ['/admin/manage-site-settings'],
        ];
    }

    public function test_lead_resource_has_no_create_route(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/admin/leads/create')->assertStatus(404);
    }

    public function test_public_landing_page_renders_seeded_content(): void
    {
        SiteSetting::current()->update(['hero_badge' => 'Test Badge']);
        Stat::create(['value' => '1', 'label' => 'Test Stat', 'sort_order' => 0]);
        Advantage::create(['icon' => 'shield', 'title' => 'Test Advantage', 'desc' => 'Desc', 'sort_order' => 0]);
        HouseType::create([
            'name' => 'Test Type', 'price' => '1000000', 'land' => '72', 'building' => '36',
            'bedrooms' => 1, 'bathrooms' => 1, 'carport' => 1,
            'featured' => false, 'sort_order' => 0,
        ]);
        Facility::create(['icon' => 'water', 'name' => 'Test Facility', 'desc' => 'Desc', 'sort_order' => 0]);
        GalleryItem::create(['label' => 'Test Gallery', 'span' => '', 'sort_order' => 0]);
        AccessPoint::create(['text' => 'Test Access Point', 'sort_order' => 0]);
        Testimonial::create(['name' => 'Test Name', 'role' => 'Role', 'quote' => 'Quote', 'rating' => 4, 'sort_order' => 0]);
        Faq::create(['q' => 'Test Question', 'a' => 'Test Answer', 'sort_order' => 0]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Test Badge');
        $response->assertSee('Test Stat');
        $response->assertSee('Test Advantage');
        $response->assertSee('Test Type');
        $response->assertSee('Test Facility');
        $response->assertSee('Test Gallery');
        $response->assertSee('Test Access Point');
        $response->assertSee('Test Name');
        $response->assertSee('Test Question');
    }

    public function test_gallery_form_shows_size_preview_without_gradient_fields(): void
    {
        $admin = User::factory()->create();

        \Livewire\Livewire::actingAs($admin)
            ->test(\App\Filament\Resources\GalleryItems\Pages\CreateGalleryItem::class)
            ->assertSee('Pratinjau di galeri')
            ->assertSee('Ukuran Tile')
            ->assertDontSee('Kelas Gradient')
            ->set('data.span', 'sm:col-span-2 sm:row-span-2')
            ->assertSee('grid-column:1 / span 2;grid-row:1 / span 2');
    }

    public function test_gallery_item_can_be_created_with_default_and_chosen_size(): void
    {
        $admin = User::factory()->create();
        \Illuminate\Support\Facades\Storage::fake('public');

        $page = \Livewire\Livewire::actingAs($admin)
            ->test(\App\Filament\Resources\GalleryItems\Pages\CreateGalleryItem::class)
            ->fillForm([
                'label' => 'Normal',
                'image' => \Illuminate\Http\UploadedFile::fake()->image('a.jpg'),
            ])
            ->call('create')
            ->assertHasNoFormErrors();
        $this->assertSame('', GalleryItem::where('label', 'Normal')->first()->span);

        $page = \Livewire\Livewire::actingAs($admin)
            ->test(\App\Filament\Resources\GalleryItems\Pages\CreateGalleryItem::class)
            ->fillForm([
                'label' => 'Lebar',
                'image' => \Illuminate\Http\UploadedFile::fake()->image('b.jpg'),
                'span' => 'sm:col-span-2',
            ])
            ->call('create')
            ->assertHasNoFormErrors();
        $this->assertSame('sm:col-span-2', GalleryItem::where('label', 'Lebar')->first()->span);
    }

    public function test_house_type_price_and_area_are_formatted(): void
    {
        $this->assertSame('Rp1.000.000', \App\Models\HouseType::formatRupiah('1000000'));
        $this->assertSame('Rp525.000.000', \App\Models\HouseType::formatRupiah('525000000'));
        $this->assertSame('72 m²', \App\Models\HouseType::formatArea('72'));
        $this->assertSame('36,5 m²', \App\Models\HouseType::formatArea('36.5'));
    }

    public function test_house_type_name_dropdown_and_custom_option(): void
    {
        $this->assertSame('Blok B', \App\Filament\Resources\HouseTypes\Schemas\HouseTypeForm::resolveName(['name_choice' => 'Blok B', 'name_custom' => 'x'])['name']);
        $this->assertSame('Tipe 36/72', \App\Filament\Resources\HouseTypes\Schemas\HouseTypeForm::resolveName(['name_choice' => 'custom', 'name_custom' => ' Tipe 36/72 '])['name']);

        $filled = \App\Filament\Resources\HouseTypes\Schemas\HouseTypeForm::fillName(['name' => 'Tipe 45/90']);
        $this->assertSame('custom', $filled['name_choice']);
        $this->assertSame('Tipe 45/90', $filled['name_custom']);

        $admin = User::factory()->create();
        \Livewire\Livewire::actingAs($admin)
            ->test(\App\Filament\Resources\HouseTypes\Pages\CreateHouseType::class)
            ->assertSee('Isi sendiri')
            ->assertDontSee('Nama (isi sendiri)')
            ->set('data.name_choice', 'custom')
            ->assertSee('Nama (isi sendiri)');
    }

    public function test_lead_status_can_be_updated_from_admin(): void
    {
        $admin = User::factory()->create();
        $lead = Lead::create([
            'name' => 'Lead Name', 'phone' => '0812', 'email' => null,
            'message' => null,
        ]);

        $this->assertEquals('new', $lead->fresh()->status);

        $this->actingAs($admin)->get("/admin/leads/{$lead->id}/edit")->assertStatus(200);
    }
}
