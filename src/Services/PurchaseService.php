<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Purchase Service
 *
 * Handles all purchase-related operations via the Daftra API.
 * Endpoint: /purchases{format}
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all purchases with optional filtering
 *   - find(int $id) - Find a specific purchase by ID
 *   - create(array $data) - Create a new purchase
 *   - update(int $id, array $data) - Update an existing purchase
 *   - delete(int $id) - Delete a purchase
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate purchases
 *
 * Path parameters:
 *   - format (string, default: ".json") - Format of the output
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class PurchaseService extends BaseService
{
    protected ?string $endpoint = '/purchases';
}
