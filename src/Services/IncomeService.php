<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Income Service
 *
 * Handles all income-related operations via the Daftra API.
 * Endpoint: /incomes
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all incomes with optional filtering
 *   - find(int $id) - Find a specific income by ID
 *   - create(array $data) - Create a new income
 *   - update(int $id, array $data) - Update an existing income
 *   - delete(int $id) - Delete an income
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate incomes
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /incomes{format}, GET /incomes/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class IncomeService extends BaseService
{
    protected ?string $endpoint = '/incomes';
} 