<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Supplier Service
 *
 * Handles all supplier-related operations via the Daftra API.
 * Endpoint: /suppliers{format}
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all suppliers with optional filtering
 *   - find(int $id) - Find a specific supplier by ID
 *   - create(array $data) - Create a new supplier
 *   - update(int $id, array $data) - Update an existing supplier
 *   - delete(int $id) - Delete a supplier
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate suppliers
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
class SupplierService extends BaseService
{
    protected ?string $endpoint = '/suppliers';
}
