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
            'name' => 'Test Type', 'price' => 'Rp 1', 'land' => '1 m²', 'building' => '1 m²',
            'bedrooms' => 1, 'bathrooms' => 1, 'carport' => 1,
            'gradient_classes' => 'from-gold-300 to-gold-600', 'featured' => false, 'sort_order' => 0,
        ]);
        Facility::create(['icon' => 'water', 'name' => 'Test Facility', 'desc' => 'Desc', 'sort_order' => 0]);
        GalleryItem::create(['label' => 'Test Gallery', 'from_class' => 'from-gold-300', 'to_class' => 'to-gold-600', 'span' => '', 'sort_order' => 0]);
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

    public function test_lead_status_can_be_updated_from_admin(): void
    {
        $admin = User::factory()->create();
        $lead = Lead::create([
            'name' => 'Lead Name', 'phone' => '0812', 'email' => null,
            'house_type' => null, 'message' => null,
        ]);

        $this->assertEquals('new', $lead->fresh()->status);

        $this->actingAs($admin)->get("/admin/leads/{$lead->id}/edit")->assertStatus(200);
    }
}
