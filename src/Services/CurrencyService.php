<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Currency Service
 *
 * Handles all currency-related operations via the Daftra API.
 * Endpoint: /currencies
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all currencies with optional filtering
 *   - find(int $id) - Find a specific currency by ID
 *   - create(array $data) - Create a new currency
 *   - update(int $id, array $data) - Update an existing currency
 *   - delete(int $id) - Delete a currency
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate currencies
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /currencies{format}, GET /currencies/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class CurrencyService extends BaseService
{
    protected ?string $endpoint = '/currencies';
}
