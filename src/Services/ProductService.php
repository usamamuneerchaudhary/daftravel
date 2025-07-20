<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Product Service
 *
 * Handles all product-related operations via the Daftra API.
 * Endpoint: /products
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all products with optional filtering
 *   - find(int $id) - Find a specific product by ID
 *   - create(array $data) - Create a new product
 *   - update(int $id, array $data) - Update an existing product
 *   - delete(int $id) - Delete a product
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate products
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /products{format}, GET /products/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class ProductService extends BaseService
{
    protected ?string $endpoint = '/products';
}
