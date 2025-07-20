<?php

namespace UsamamuneerChaudhary\Daftravel\Tests\Feature;

use UsamamuneerChaudhary\Daftravel\Tests\TestCase;
use UsamamuneerChaudhary\Daftravel\Daftravel;
use UsamamuneerChaudhary\Daftravel\Services\TimeTrackingService;

class TimeTrackingServiceTest extends TestCase
{
    protected $daftravel;
    protected $timeTrackingService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->daftravel = app('daftravel');
        $this->timeTrackingService = $this->daftravel->timeTracking();
    }

    public function testTimeTrackingServiceExists()
    {
        $this->assertInstanceOf(TimeTrackingService::class, $this->timeTrackingService);
    }

    public function testCanGetAllTimeEntries()
    {
        $result = $this->timeTrackingService->all();
        $this->assertIsArray($result);
    }

    public function testCanFindTimeEntry()
    {
        $result = $this->timeTrackingService->find(1);
        $this->assertIsArray($result);
    }

    public function testCanCreateTimeEntry()
    {
        $data = ['project_id' => 1, 'hours' => 8.5, 'date' => '2023-12-01'];
        $result = $this->timeTrackingService->create($data);
        $this->assertIsArray($result);
    }

    public function testCanUpdateTimeEntry()
    {
        $data = ['hours' => 9.0];
        $result = $this->timeTrackingService->update(1, $data);
        $this->assertIsArray($result);
    }

    public function testCanDeleteTimeEntry()
    {
        $result = $this->timeTrackingService->delete(1);
        $this->assertIsArray($result);
    }
} 