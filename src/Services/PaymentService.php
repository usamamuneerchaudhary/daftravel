<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Payment Service
 *
 * Handles all payment-related operations via the Daftra API.
 * Endpoint: /payments{format}
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all payments with optional filtering
 *   - find(int $id) - Find a specific payment by ID
 *   - create(array $data) - Create a new payment
 *   - update(int $id, array $data) - Update an existing payment
 *   - delete(int $id) - Delete a payment
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate payments
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
class PaymentService extends BaseService
{
    protected ?string $endpoint = '/payments';
}
