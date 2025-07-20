<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Purchase Refund Service
 *
 * Handles all purchase refund-related operations via the Daftra API.
 * Endpoint: /purchase_refunds
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all purchase refunds with optional filtering
 *   - find(int $id) - Find a specific purchase refund by ID
 *   - create(array $data) - Create a new purchase refund
 *   - update(int $id, array $data) - Update an existing purchase refund
 *   - delete(int $id) - Delete a purchase refund
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate purchase refunds
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /purchase_refunds{format}, GET /purchase_refunds/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class PurchaseRefundService extends BaseService
{
    protected ?string $endpoint = '/purchase_refunds';
} 