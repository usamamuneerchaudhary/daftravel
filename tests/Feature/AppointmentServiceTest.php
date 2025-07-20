<?php

namespace UsamamuneerChaudhary\Daftravel\Tests\Feature;

use UsamamuneerChaudhary\Daftravel\Tests\TestCase;
use UsamamuneerChaudhary\Daftravel\Daftravel;
use UsamamuneerChaudhary\Daftravel\Services\AppointmentService;

class AppointmentServiceTest extends TestCase
{
    protected $daftravel;
    protected $appointmentService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->daftravel = app('daftravel');
        $this->appointmentService = $this->daftravel->appointments();
    }

    public function testAppointmentServiceExists()
    {
        $this->assertInstanceOf(AppointmentService::class, $this->appointmentService);
    }

    public function testCanGetAllAppointments()
    {
        $result = $this->appointmentService->all();
        $this->assertIsArray($result);
    }

    public function testCanFindAppointment()
    {
        $result = $this->appointmentService->find(1);
        $this->assertIsArray($result);
    }

    public function testCanCreateAppointment()
    {
        $data = ['title' => 'New Appointment', 'date' => '2023-12-01'];
        $result = $this->appointmentService->create($data);
        $this->assertIsArray($result);
    }

    public function testCanUpdateAppointment()
    {
        $data = ['title' => 'Updated Appointment'];
        $result = $this->appointmentService->update(1, $data);
        $this->assertIsArray($result);
    }

    public function testCanDeleteAppointment()
    {
        $result = $this->appointmentService->delete(1);
        $this->assertIsArray($result);
    }
} 