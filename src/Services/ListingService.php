<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Listing Service
 *
 * Handles all listing-related operations via the Daftra API.
 * Endpoint: /listing
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all listings with optional filtering
 *   - find(int $id) - Find a specific listing by ID
 *   - create(array $data) - Create a new listing
 *   - update(int $id, array $data) - Update an existing listing
 *   - delete(int $id) - Delete a listing
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate listings
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /listing{format}, GET /listing/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class ListingService extends BaseService
{
    protected ?string $endpoint = '/listing';
} 