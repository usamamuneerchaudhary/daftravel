<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Invoice Service
 *
 * Handles all invoice-related operations via the Daftra API.
 * Endpoint: /invoices
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all invoices with optional filtering
 *   - find(int $id) - Find a specific invoice by ID
 *   - create(array $data) - Create a new invoice
 *   - update(int $id, array $data) - Update an existing invoice
 *   - delete(int $id) - Delete an invoice
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate invoices
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /invoices{format}, GET /invoices/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class InvoiceService extends BaseService
{
    protected ?string $endpoint = '/invoices';
}
