<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Category Service
 *
 * Handles all category-related operations via the Daftra API.
 * Endpoint: /categories
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all categories with optional filtering
 *   - find(int $id) - Find a specific category by ID
 *   - create(array $data) - Create a new category
 *   - update(int $id, array $data) - Update an existing category
 *   - delete(int $id) - Delete a category
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate categories
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /categories{format}, GET /categories/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class CategoryService extends BaseService
{
    protected ?string $endpoint = '/categories';
}
