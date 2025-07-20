<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Inventory Service
 *
 * Handles all inventory-related operations via the Daftra API.
 * Endpoint: /inventory
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all inventory records with optional filtering
 *   - find(int $id) - Find a specific inventory record by ID
 *   - create(array $data) - Create a new inventory record
 *   - update(int $id, array $data) - Update an existing inventory record
 *   - delete(int $id) - Delete an inventory record
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate inventory records
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /inventory{format}, GET /inventory/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class InventoryService extends BaseService
{
    protected ?string $endpoint = '/inventory';
}
