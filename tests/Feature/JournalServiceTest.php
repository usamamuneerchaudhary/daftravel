<?php

namespace UsamamuneerChaudhary\Daftravel\Tests\Feature;

use UsamamuneerChaudhary\Daftravel\Tests\TestCase;
use UsamamuneerChaudhary\Daftravel\Daftravel;
use UsamamuneerChaudhary\Daftravel\Services\JournalService;

class JournalServiceTest extends TestCase
{
    protected $daftravel;
    protected $journalService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->daftravel = app('daftravel');
        $this->journalService = $this->daftravel->journals();
    }

    public function testJournalServiceExists()
    {
        $this->assertInstanceOf(JournalService::class, $this->journalService);
    }

    public function testCanGetAllJournals()
    {
        $result = $this->journalService->all();
        $this->assertIsArray($result);
    }

    public function testCanFindJournal()
    {
        $result = $this->journalService->find(1);
        $this->assertIsArray($result);
    }

    public function testCanCreateJournal()
    {
        $data = ['title' => 'New Journal', 'description' => 'Test description'];
        $result = $this->journalService->create($data);
        $this->assertIsArray($result);
    }

    public function testCanUpdateJournal()
    {
        $data = ['title' => 'Updated Journal'];
        $result = $this->journalService->update(1, $data);
        $this->assertIsArray($result);
    }

    public function testCanDeleteJournal()
    {
        $result = $this->journalService->delete(1);
        $this->assertIsArray($result);
    }
} 