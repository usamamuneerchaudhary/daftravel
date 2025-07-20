<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Customer Service
 *
 * Handles all customer-related operations via the Daftra API.
 * Endpoint: /clients
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all customers with optional filtering
 *   - find(int $id) - Find a specific customer by ID
 *   - create(array $data) - Create a new customer
 *   - update(int $id, array $data) - Update an existing customer
 *   - delete(int $id) - Delete a customer
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate customers
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /clients{format}, GET /clients/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class CustomerService extends BaseService
{
    protected ?string $endpoint = '/clients';
}
