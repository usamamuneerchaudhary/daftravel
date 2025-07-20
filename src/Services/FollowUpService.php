<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Follow Up Service
 *
 * Handles all follow up-related operations via the Daftra API.
 * Endpoint: /follow_ups
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all follow ups with optional filtering
 *   - find(int $id) - Find a specific follow up by ID
 *   - create(array $data) - Create a new follow up
 *   - update(int $id, array $data) - Update an existing follow up
 *   - delete(int $id) - Delete a follow up
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate follow ups
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /follow_ups{format}, GET /follow_ups/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class FollowUpService extends BaseService
{
    protected ?string $endpoint = '/follow_ups';
} 