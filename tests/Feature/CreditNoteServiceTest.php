<?php

namespace UsamamuneerChaudhary\Daftravel\Tests\Feature;

use UsamamuneerChaudhary\Daftravel\Tests\TestCase;
use UsamamuneerChaudhary\Daftravel\Daftravel;
use UsamamuneerChaudhary\Daftravel\Services\CreditNoteService;

class CreditNoteServiceTest extends TestCase
{
    protected $daftravel;
    protected $creditNoteService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->daftravel = app('daftravel');
        $this->creditNoteService = $this->daftravel->creditNotes();
    }

    public function testCreditNoteServiceExists()
    {
        $this->assertInstanceOf(CreditNoteService::class, $this->creditNoteService);
    }

    public function testCanGetAllCreditNotes()
    {
        $result = $this->creditNoteService->all();
        $this->assertIsArray($result);
    }

    public function testCanFindCreditNote()
    {
        $result = $this->creditNoteService->find(1);
        $this->assertIsArray($result);
    }

    public function testCanCreateCreditNote()
    {
        $data = ['customer_id' => 1, 'amount' => 100.00, 'reason' => 'Return'];
        $result = $this->creditNoteService->create($data);
        $this->assertIsArray($result);
    }

    public function testCanUpdateCreditNote()
    {
        $data = ['amount' => 150.00];
        $result = $this->creditNoteService->update(1, $data);
        $this->assertIsArray($result);
    }

    public function testCanDeleteCreditNote()
    {
        $result = $this->creditNoteService->delete(1);
        $this->assertIsArray($result);
    }
} 