<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Stock Transaction Service
 *
 * Handles all stock transaction-related operations via the Daftra API.
 * Endpoint: /stock_transactions
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all stock transactions with optional filtering
 *   - find(int $id) - Find a specific stock transaction by ID
 *   - create(array $data) - Create a new stock transaction
 *   - update(int $id, array $data) - Update an existing stock transaction
 *   - delete(int $id) - Delete a stock transaction
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate stock transactions
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /stock_transactions{format}, GET /stock_transactions/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class StockTransactionService extends BaseService
{
    protected ?string $endpoint = '/stock_transactions';
} 