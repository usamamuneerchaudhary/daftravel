<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Price List Service
 *
 * Handles all price list-related operations via the Daftra API.
 * Endpoint: /price_lists
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all price lists with optional filtering
 *   - find(int $id) - Find a specific price list by ID
 *   - create(array $data) - Create a new price list
 *   - update(int $id, array $data) - Update an existing price list
 *   - delete(int $id) - Delete a price list
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate price lists
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /price_lists{format}, GET /price_lists/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class PriceListService extends BaseService
{
    protected ?string $endpoint = '/price_lists';
}
