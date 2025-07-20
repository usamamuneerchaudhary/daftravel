<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Note Service
 *
 * Handles all note-related operations via the Daftra API.
 * Endpoint: /notes
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all notes with optional filtering
 *   - find(int $id) - Find a specific note by ID
 *   - create(array $data) - Create a new note
 *   - update(int $id, array $data) - Update an existing note
 *   - delete(int $id) - Delete a note
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate notes
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /notes{format}, GET /notes/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class NoteService extends BaseService
{
    protected ?string $endpoint = '/notes';
} 