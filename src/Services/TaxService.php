<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Tax Service
 *
 * Handles all tax-related operations via the Daftra API.
 * Endpoint: /taxes
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all taxes with optional filtering
 *   - find(int $id) - Find a specific tax by ID
 *   - create(array $data) - Create a new tax
 *   - update(int $id, array $data) - Update an existing tax
 *   - delete(int $id) - Delete a tax
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate taxes
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /taxes{format}, GET /taxes/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class TaxService extends BaseService
{
    protected ?string $endpoint = '/taxes';
}
