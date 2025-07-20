<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Credit Note Service
 *
 * Handles all credit note-related operations via the Daftra API.
 * Endpoint: /credit_notes
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all credit notes with optional filtering
 *   - find(int $id) - Find a specific credit note by ID
 *   - create(array $data) - Create a new credit note
 *   - update(int $id, array $data) - Update an existing credit note
 *   - delete(int $id) - Delete a credit note
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate credit notes
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /credit_notes{format}, GET /credit_notes/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class CreditNoteService extends BaseService
{
    protected ?string $endpoint = '/credit_notes';
} 