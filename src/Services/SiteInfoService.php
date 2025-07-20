<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Site Info Service
 *
 * Handles all site information operations via the Daftra API.
 * Endpoint: /site_info{format}
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all site info records with optional filtering
 *   - find(int $id) - Find a specific site info record by ID
 *   - create(array $data) - Create a new site info record
 *   - update(int $id, array $data) - Update an existing site info record
 *   - delete(int $id) - Delete a site info record
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate site info records
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
class SiteInfoService extends BaseService
{
    protected ?string $endpoint = '/site_info';
} 