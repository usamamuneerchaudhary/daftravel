<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Expense Service
 *
 * Handles all expense-related operations via the Daftra API.
 * Endpoint: /expenses{format}
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all expenses with optional filtering
 *   - find(int $id) - Find a specific expense by ID
 *   - create(array $data) - Create a new expense
 *   - update(int $id, array $data) - Update an existing expense
 *   - delete(int $id) - Delete an expense
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate expenses
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
class ExpenseService extends BaseService
{
    protected ?string $endpoint = '/expenses';
}
