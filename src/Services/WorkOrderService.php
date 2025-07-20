<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Work Order Service
 *
 * Handles all work order-related operations via the Daftra API.
 * Endpoint: /work_orders
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all work orders with optional filtering
 *   - find(int $id) - Find a specific work order by ID
 *   - create(array $data) - Create a new work order
 *   - update(int $id, array $data) - Update an existing work order
 *   - delete(int $id) - Delete a work order
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate work orders
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /work_orders{format}, GET /work_orders/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class WorkOrderService extends BaseService
{
    protected ?string $endpoint = '/work_orders';
} 