<?php

namespace Tests\Feature\Pages\Presentation;

use Tests\TestCase;

/**
 * @coversDefaultClass \App\Pages\Presentation\Http\Controllers\HomepageController
 */
class HomepageTest extends TestCase
{
    /**
     * @test
     *
     * @covers ::__invoke
     */
    public function shouldGetHomepage(): void
    {
        $response = $this->get('/');

        $response->assertOk();

        $response->assertSeeText('Ilya Shabanov - Software Engineer - Home');
        $response->assertSeeText('SOFTWARE DEVELOPER');
        $response->assertSeeText('SOLVING PROBLEMS');
    }
}
