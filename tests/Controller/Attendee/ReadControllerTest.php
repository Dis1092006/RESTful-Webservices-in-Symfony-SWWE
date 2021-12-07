<?php

declare(strict_types=1);

namespace App\Tests\Controller\Attendee;

/**
 * @author Dmitry Samsonov <dmitry.samsonov@ecentria.com>
 */
final class ReadControllerTest extends \App\Tests\ApiTestCase
{
    public function test_it_should_show_requested_attendee(): void
    {
        $this->loadFixtures([
            __DIR__.'/fixtures/read_attendee.yaml',
        ]);

        $this->browser->request('GET', '/attendees/02d47053-4034-4818-97d1-299c4cd7168d');

        static::assertResponseIsSuccessful();

        $this->assertMatchesJsonSnapshot($this->browser->getResponse()->getContent());
    }
}