<?php

namespace Tests\Feature;

use App\Models\Challenge;
use App\Models\Track;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DeleteTrackTest extends TestCase
{
    private $endpoint = '/api/admin/track/delete/';

    /**
     * A feature test for deleting a track that doesn't have challenges.
     *
     * @return void
     */
    public function test_delete_track_that_does_not_have_challenges()
    {
        $track = Track::factory()->create();

        Sanctum::actingAs(User::factory()->create(['role' => 'admin']), ['*']);

        $response = $this->deleteJson($this->endpoint.$track->id);

        $response->assertStatus(200)->assertExactJson([
            'success' => true,
            'data' => [],
            'message' => 'Track was succefully deleted!'
        ]);

        $this->assertDatabaseCount('tracks', 0);
        $this->assertDatabaseMissing('tracks', [
            'type' => $track->type
        ]);
    }

    /**
     * A feature test for deleting a track that has challenges.
     *
     * @return void
     */
    public function test_delete_track_that_has_challenges()
    {
        $track = Track::factory()->create();
        $challenge = Challenge::factory()->create();
        $challenge->track()->associate($track);

        Sanctum::actingAs(User::factory()->create(['role' => 'admin']), ['*']);

        $response = $this->deleteJson($this->endpoint.$track->id);

        $response->assertStatus(200)->assertExactJson([
            'success' => true,
            'data' => [],
            'message' => 'Track was succefully deleted!'
        ]);

        $this->assertDatabaseCount('tracks', 0);
        $this->assertDatabaseMissing('tracks', [
            'type' => $track->type
        ]);
        $this->assertDatabaseCount('challenges', 0);
    }
}
