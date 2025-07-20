<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * User Service
 *
 * Handles all user-related operations via the Daftra API.
 * Endpoint: /users
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all users with optional filtering
 *   - find(int $id) - Find a specific user by ID
 *   - create(array $data) - Create a new user
 *   - update(int $id, array $data) - Update an existing user
 *   - delete(int $id) - Delete a user
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate users
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /users{format}, GET /users/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class UserService extends BaseService
{
    protected ?string $endpoint = '/users';
}
