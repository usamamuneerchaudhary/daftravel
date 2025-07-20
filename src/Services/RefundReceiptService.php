<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Refund Receipt Service
 *
 * Handles all refund receipt-related operations via the Daftra API.
 * Endpoint: /refund_receipts
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all refund receipts with optional filtering
 *   - find(int $id) - Find a specific refund receipt by ID
 *   - create(array $data) - Create a new refund receipt
 *   - update(int $id, array $data) - Update an existing refund receipt
 *   - delete(int $id) - Delete a refund receipt
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate refund receipts
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /refund_receipts{format}, GET /refund_receipts/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class RefundReceiptService extends BaseService
{
    protected ?string $endpoint = '/refund_receipts';
} 