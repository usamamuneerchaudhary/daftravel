<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Client Attendance Service
 *
 * Handles all client attendance-related operations via the Daftra API.
 * Endpoint: /client_attendance
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all client attendance records with optional filtering
 *   - find(int $id) - Find a specific client attendance record by ID
 *   - create(array $data) - Create a new client attendance record
 *   - update(int $id, array $data) - Update an existing client attendance record
 *   - delete(int $id) - Delete a client attendance record
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate client attendance records
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /client_attendance{format}, GET /client_attendance/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class ClientAttendanceService extends BaseService
{
    protected ?string $endpoint = '/client_attendance';
} 