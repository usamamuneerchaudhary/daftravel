<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Report Service
 * 
 * Handles all report-related operations via the Daftra API.
 * Endpoint: /reports
 * 
 * @see https://azmart.daftra.com/api_docs/v2
 */
class ReportService extends BaseService
{
    protected ?string $endpoint = '/reports';

    /**
     * Get all reports
     * 
     * @param array $params Query parameters
     * @return array
     * 
     * Common parameters: limit, page, search
     * Report-specific parameters: type, date_from, date_to
     * See: https://azmart.daftra.com/api_docs/v2
     */
    public function all(array $params = [])
    {
        return parent::all($params);
    }

    /**
     * Find a specific report by ID
     * 
     * @param int $id Report ID
     * @return array
     * 
     * @see https://azmart.daftra.com/api_docs/v2
     */
    public function find(int $id)
    {
        return parent::find($id);
    }

    /**
     * Create a new report
     * 
     * @param array $data Report data
     * @return array
     * 
     * @see https://azmart.daftra.com/api_docs/v2
     */
    public function create(array $data)
    {
        return parent::create($data);
    }

    /**
     * Update an existing report
     * 
     * @param int $id Report ID
     * @param array $data Report data to update
     * @return array
     * 
     * @see https://azmart.daftra.com/api_docs/v2
     */
    public function update(int $id, array $data)
    {
        return parent::update($id, $data);
    }

    /**
     * Delete a report
     * 
     * @param int $id Report ID
     * @return array
     * 
     * @see https://azmart.daftra.com/api_docs/v2
     */
    public function delete(int $id)
    {
        return parent::delete($id);
    }

    /**
     * Paginate reports
     * 
     * @param int $page Page number (>= 1, default: 1)
     * @param int $limit Number of records per page (1-1000, default: 20)
     * @param array $params Additional query parameters
     * @return array
     * 
     * @see https://azmart.daftra.com/api_docs/v2
     */
    public function paginate(int $page = 1, int $limit = 20, array $params = [])
    {
        return parent::paginate($page, $limit, $params);
    }

    /**
     * Search reports
     * 
     * @param string $query Search query
     * @param array $params Additional query parameters
     * @return array
     * 
     * @see https://azmart.daftra.com/api_docs/v2
     */
    public function search(string $query, array $params = [])
    {
        return parent::search($query, $params);
    }
}
