<?php

namespace Tests\Feature;

use App\Models\Project;
use Tests\TestCase;

class AdminProjectTest extends TestCase
{
    /**
     * Test admin dashboard page can be loaded.
     */
    public function test_admin_home_page_can_be_rendered(): void
    {
        $response = $this->get(route('admin.home'));

        $response->assertStatus(200);
        $response->assertSee('Selamat Datang di Halaman Admin');
    }

    /**
     * Test admin projects index page can be loaded.
     */
    public function test_admin_projects_index_can_be_rendered(): void
    {
        $response = $this->get(route('admin.project.index'));

        $response->assertStatus(200);
        $response->assertSee('Daftar Project');
    }

    /**
     * Test admin project create page can be loaded.
     */
    public function test_admin_project_create_page_can_be_rendered(): void
    {
        $response = $this->get(route('admin.project.create'));

        $response->assertStatus(200);
        $response->assertSee('Tambah Project Baru');
    }

    /**
     * Test storing a new project.
     */
    public function test_admin_can_store_new_project(): void
    {
        $payload = [
            'title' => 'Unit Test Project',
            'description' => 'Unit test project description',
            'teknologi' => 'Laravel & PHPUnit',
            'status' => 'In Progress',
        ];

        $response = $this->post(route('admin.project.store'), $payload);

        $response->assertRedirect(route('admin.project.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('projects', [
            'title' => 'Unit Test Project',
        ]);
    }

    /**
     * Test updating an existing project.
     */
    public function test_admin_can_update_project(): void
    {
        $project = Project::where('title', 'Unit Test Project')->first() ?? Project::first();

        $response = $this->put(route('admin.project.update', $project->id), [
            'title' => 'Updated Project Title',
            'description' => 'Updated description content',
            'teknologi' => 'Vue & Laravel',
            'status' => 'Selesai',
        ]);

        $response->assertRedirect(route('admin.project.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('projects', [
            'id' => $project->id,
            'title' => 'Updated Project Title',
        ]);
    }

    /**
     * Test deleting a project.
     */
    public function test_admin_can_delete_project(): void
    {
        $project = Project::where('title', 'Updated Project Title')->first();

        if ($project) {
            $response = $this->delete(route('admin.project.destroy', $project->id));

            $response->assertRedirect(route('admin.project.index'));
            $response->assertSessionHas('success');

            $this->assertDatabaseMissing('projects', [
                'id' => $project->id,
            ]);
        }
    }
}
