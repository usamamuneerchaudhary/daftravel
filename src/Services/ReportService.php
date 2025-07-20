<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Report Service
 *
 * Handles all report-related operations via the Daftra API.
 * Endpoint: /reports
 *
 * Available methods (inherited from BaseService):
 *   - all(array $params = []) - Get all reports with optional filtering
 *   - find(int $id) - Find a specific report by ID
 *   - create(array $data) - Create a new report
 *   - update(int $id, array $data) - Update an existing report
 *   - delete(int $id) - Delete a report
 *   - paginate(int $page = 1, int $limit = 20, array $params = []) - Paginate reports
 *
 * Path parameters (for GET operations):
 *   - format (string, default: ".json") - Format of the output (GET /reports{format}, GET /reports/{id}{format})
 *
 * Common query parameters:
 *   - limit (integer [1..1000], default: 20) - Number of records per page
 *   - page (integer >= 1, default: 1) - Page number
 *
 * Report-specific parameters:
 *   - type (string) - Report type filter
 *   - date_from (string) - Start date for report filtering
 *   - date_to (string) - End date for report filtering
 *
 * For complete parameter documentation and endpoint-specific features,
 * see the official Daftra API documentation: https://azmart.daftra.com/api_docs/v2
 */
class ReportService extends BaseService
{
    protected ?string $endpoint = '/reports';
}
