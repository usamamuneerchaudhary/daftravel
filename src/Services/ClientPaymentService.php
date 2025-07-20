<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Client Payment Service
 *
 * Handles all client payment-related operations via the Daftra API.
 * Endpoint: /client_payments
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all client payments with optional filtering
 *   - find(int $id) - Find a specific client payment by ID
 *   - create(array $data) - Create a new client payment
 *   - update(int $id, array $data) - Update an existing client payment
 *   - delete(int $id) - Delete a client payment
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate client payments
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /client_payments{format}, GET /client_payments/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class ClientPaymentService extends BaseService
{
    protected ?string $endpoint = '/client_payments';
} 