<?php

namespace UsamamuneerChaudhary\Daftravel\Services;

/**
 * Settings Service
 * 
 * Handles all settings-related operations via the Daftra API.
 * Endpoint: /settings
 * 
 * @see https://azmart.daftra.com/api_docs/v2
 */
class SettingsService extends BaseService
{
    protected ?string $endpoint = '/settings';

    /**
     * Get all settings
     * 
     * @param array $params Query parameters
     * @return array
     * 
     * Common parameters: limit, page, search
     * Settings-specific parameters: group, key
     * See: https://azmart.daftra.com/api_docs/v2
     */
    public function all(array $params = [])
    {
        return parent::all($params);
    }

    /**
     * Find a specific setting by ID
     * 
     * @param int $id Setting ID
     * @return array
     * 
     * @see https://azmart.daftra.com/api_docs/v2
     */
    public function find(int $id)
    {
        return parent::find($id);
    }

    /**
     * Create a new setting
     * 
     * @param array $data Setting data
     * @return array
     * 
     * @see https://azmart.daftra.com/api_docs/v2
     */
    public function create(array $data)
    {
        return parent::create($data);
    }

    /**
     * Update an existing setting
     * 
     * @param int $id Setting ID
     * @param array $data Setting data to update
     * @return array
     * 
     * @see https://azmart.daftra.com/api_docs/v2
     */
    public function update(int $id, array $data)
    {
        return parent::update($id, $data);
    }

    /**
     * Delete a setting
     * 
     * @param int $id Setting ID
     * @return array
     * 
     * @see https://azmart.daftra.com/api_docs/v2
     */
    public function delete(int $id)
    {
        return parent::delete($id);
    }

    /**
     * Paginate settings
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
     * Search settings
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
