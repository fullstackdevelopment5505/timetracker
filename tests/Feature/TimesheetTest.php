<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TimesheetTest extends TestCase
{

    /**
     * test for activities table's primary key for create timesheet.
     *
     */
    public function testInvalidActivityIDForCreate()
    {
        $data = ['activity_id' => 0];

        $this->json('POST', 'timesheet', $data, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "activity_id" => [
                        "The selected activity id is invalid."
                    ]
                ]
            ]);
    }    

    /**
     * test for timesheet table's primary key for update timesheet.
     *
     */
    public function testInvalidTimesheetIDForUpdate()
    {
        $this->json('PUT', 'timesheet/0', ['Accept' => 'application/json'])
            ->assertStatus(404);
    }    
}
