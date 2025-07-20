<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Treasury Service
 *
 * Handles all treasury-related operations via the Daftra API.
 * Endpoint: /treasuries
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all treasury records with optional filtering
 *   - find(int $id) - Find a specific treasury record by ID
 *   - create(array $data) - Create a new treasury record
 *   - update(int $id, array $data) - Update an existing treasury record
 *   - delete(int $id) - Delete a treasury record
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate treasury records
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /treasuries{format}, GET /treasuries/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class TreasuryService extends BaseService
{
    protected ?string $endpoint = '/treasuries';
} 