<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\PostCategory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostCategoryControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_post_categories(): void
    {
        $postCategories = PostCategory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('post-categories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.post_categories.index')
            ->assertViewHas('postCategories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_post_category(): void
    {
        $response = $this->get(route('post-categories.create'));

        $response->assertOk()->assertViewIs('app.post_categories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_post_category(): void
    {
        $data = PostCategory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('post-categories.store'), $data);

        $this->assertDatabaseHas('post_categories', $data);

        $postCategory = PostCategory::latest('id')->first();

        $response->assertRedirect(route('post-categories.edit', $postCategory));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_post_category(): void
    {
        $postCategory = PostCategory::factory()->create();

        $response = $this->get(route('post-categories.show', $postCategory));

        $response
            ->assertOk()
            ->assertViewIs('app.post_categories.show')
            ->assertViewHas('postCategory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_post_category(): void
    {
        $postCategory = PostCategory::factory()->create();

        $response = $this->get(route('post-categories.edit', $postCategory));

        $response
            ->assertOk()
            ->assertViewIs('app.post_categories.edit')
            ->assertViewHas('postCategory');
    }

    /**
     * @test
     */
    public function it_updates_the_post_category(): void
    {
        $postCategory = PostCategory::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
        ];

        $response = $this->put(
            route('post-categories.update', $postCategory),
            $data
        );

        $data['id'] = $postCategory->id;

        $this->assertDatabaseHas('post_categories', $data);

        $response->assertRedirect(route('post-categories.edit', $postCategory));
    }

    /**
     * @test
     */
    public function it_deletes_the_post_category(): void
    {
        $postCategory = PostCategory::factory()->create();

        $response = $this->delete(
            route('post-categories.destroy', $postCategory)
        );

        $response->assertRedirect(route('post-categories.index'));

        $this->assertModelMissing($postCategory);
    }
}
