<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Appointment Service
 *
 * Handles all appointment-related operations via the Daftra API.
 * Endpoint: /client_appointments
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all appointments with optional filtering
 *   - find(int $id) - Find a specific appointment by ID
 *   - create(array $data) - Create a new appointment
 *   - update(int $id, array $data) - Update an existing appointment
 *   - delete(int $id) - Delete an appointment
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate appointments
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /client_appointments{format}, GET /client_appointments/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class AppointmentService extends BaseService
{
    protected ?string $endpoint = '/client_appointments';
}
