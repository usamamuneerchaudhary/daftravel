<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Journal Service
 *
 * Handles all journal-related operations via the Daftra API.
 * Endpoint: /journals
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all journals with optional filtering
 *   - find(int $id) - Find a specific journal by ID
 *   - create(array $data) - Create a new journal
 *   - update(int $id, array $data) - Update an existing journal
 *   - delete(int $id) - Delete a journal
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate journals
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /journals{format}, GET /journals/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class JournalService extends BaseService
{
    protected ?string $endpoint = '/journals';
} 