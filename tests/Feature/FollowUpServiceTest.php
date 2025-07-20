<?php

namespace UsamamuneerChaudhary\Daftravel\Tests\Feature;

use UsamamuneerChaudhary\Daftravel\Tests\TestCase;
use UsamamuneerChaudhary\Daftravel\Daftravel;
use UsamamuneerChaudhary\Daftravel\Services\FollowUpService;

class FollowUpServiceTest extends TestCase
{
    protected $daftravel;
    protected $followUpService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->daftravel = app('daftravel');
        $this->followUpService = $this->daftravel->followUps();
    }

    public function testFollowUpServiceExists()
    {
        $this->assertInstanceOf(FollowUpService::class, $this->followUpService);
    }

    public function testCanGetAllFollowUps()
    {
        $result = $this->followUpService->all();
        $this->assertIsArray($result);
    }

    public function testCanFindFollowUp()
    {
        $result = $this->followUpService->find(1);
        $this->assertIsArray($result);
    }

    public function testCanCreateFollowUp()
    {
        $data = ['action' => 'Send email', 'due_date' => '2023-12-01'];
        $result = $this->followUpService->create($data);
        $this->assertIsArray($result);
    }

    public function testCanUpdateFollowUp()
    {
        $data = ['action' => 'Updated action'];
        $result = $this->followUpService->update(1, $data);
        $this->assertIsArray($result);
    }

    public function testCanDeleteFollowUp()
    {
        $result = $this->followUpService->delete(1);
        $this->assertIsArray($result);
    }
} 