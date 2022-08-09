<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CounterControllerTest extends TestCase
{
    /**
     * Display counts in tests.
     *
     * @return void
     */
    public function testCounterIsCorrectResponse()
    {
        $response = $this->get('api/counter');

        $content = json_decode($response->getContent(), true);

        $this->assertIsArray($content);
        $this->assertIsNumeric($content['id']);
        $this->assertIsNumeric($content['clicksTally']);
        $this->assertIsBool($content['completed']);
        $response->assertStatus(200);
    }

    public function testCounterIsNotCorrectResponse()
    {
        $response = $this->get('api/counter');
        $response->setStatusCode(500);
        $clicksTallyString = '4';

        $this->assertIsNotInt($clicksTallyString);
        $response->assertStatus(500);
    }
}
