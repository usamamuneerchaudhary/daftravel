<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Time Tracking Service
 *
 * Handles all time tracking-related operations via the Daftra API.
 * Endpoint: /time_tracking
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all time tracking records with optional filtering
 *   - find(int $id) - Find a specific time tracking record by ID
 *   - create(array $data) - Create a new time tracking record
 *   - update(int $id, array $data) - Update an existing time tracking record
 *   - delete(int $id) - Delete a time tracking record
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate time tracking records
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /time_tracking{format}, GET /time_tracking/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class TimeTrackingService extends BaseService
{
    protected ?string $endpoint = '/time_tracking';
} 