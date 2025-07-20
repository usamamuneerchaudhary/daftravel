<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Transaction Service
 *
 * Handles all transaction-related operations via the Daftra API.
 * Endpoint: /transactions
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all transactions with optional filtering
 *   - find(int $id) - Find a specific transaction by ID
 *   - create(array $data) - Create a new transaction
 *   - update(int $id, array $data) - Update an existing transaction
 *   - delete(int $id) - Delete a transaction
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate transactions
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /transactions{format}, GET /transactions/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class TransactionService extends BaseService
{
    protected ?string $endpoint = '/transactions';
}
