<?php

namespace UsamamuneerChaudhary\Daftravel\Tests\Feature;

use UsamamuneerChaudhary\Daftravel\Tests\TestCase;
use UsamamuneerChaudhary\Daftravel\Daftravel;
use UsamamuneerChaudhary\Daftravel\Services\WorkOrderService;

class WorkOrderServiceTest extends TestCase
{
    protected $daftravel;
    protected $workOrderService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->daftravel = app('daftravel');
        $this->workOrderService = $this->daftravel->workOrders();
    }

    public function testWorkOrderServiceExists()
    {
        $this->assertInstanceOf(WorkOrderService::class, $this->workOrderService);
    }

    public function testCanGetAllWorkOrders()
    {
        $result = $this->workOrderService->all();
        $this->assertIsArray($result);
    }

    public function testCanFindWorkOrder()
    {
        $result = $this->workOrderService->find(1);
        $this->assertIsArray($result);
    }

    public function testCanCreateWorkOrder()
    {
        $data = ['title' => 'New Work Order', 'description' => 'Test description'];
        $result = $this->workOrderService->create($data);
        $this->assertIsArray($result);
    }

    public function testCanUpdateWorkOrder()
    {
        $data = ['title' => 'Updated Work Order'];
        $result = $this->workOrderService->update(1, $data);
        $this->assertIsArray($result);
    }

    public function testCanDeleteWorkOrder()
    {
        $result = $this->workOrderService->delete(1);
        $this->assertIsArray($result);
    }
} 