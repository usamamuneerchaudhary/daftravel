<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Store Service
 *
 * Handles all store-related operations via the Daftra API.
 * Endpoint: /stores{format}
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all stores with optional filtering
 *   - find(int $id) - Find a specific store by ID
 *   - create(array $data) - Create a new store
 *   - update(int $id, array $data) - Update an existing store
 *   - delete(int $id) - Delete a store
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate stores
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
class StoreService extends BaseService
{
    protected ?string $endpoint = '/stores';
}
