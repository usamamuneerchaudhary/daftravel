<?php

namespace UsamamuneerChaudhary\Daftravel\Tests\Feature;

use UsamamuneerChaudhary\Daftravel\Tests\TestCase;
use UsamamuneerChaudhary\Daftravel\Daftravel;
use UsamamuneerChaudhary\Daftravel\Services\NoteService;

class NoteServiceTest extends TestCase
{
    protected $daftravel;
    protected $noteService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->daftravel = app('daftravel');
        $this->noteService = $this->daftravel->notes();
    }

    public function testNoteServiceExists()
    {
        $this->assertInstanceOf(NoteService::class, $this->noteService);
    }

    public function testCanGetAllNotes()
    {
        $result = $this->noteService->all();
        $this->assertIsArray($result);
    }

    public function testCanFindNote()
    {
        $result = $this->noteService->find(1);
        $this->assertIsArray($result);
    }

    public function testCanCreateNote()
    {
        $data = ['content' => 'New note', 'type' => 'general'];
        $result = $this->noteService->create($data);
        $this->assertIsArray($result);
    }

    public function testCanUpdateNote()
    {
        $data = ['content' => 'Updated note'];
        $result = $this->noteService->update(1, $data);
        $this->assertIsArray($result);
    }

    public function testCanDeleteNote()
    {
        $result = $this->noteService->delete(1);
        $this->assertIsArray($result);
    }
} 