<?php

require_once __DIR__ . '/../vendor/autoload.php';

use UsamamuneerChaudhary\Daftravel\Daftravel;
use UsamamuneerChaudhary\Daftravel\Exceptions\AuthenticationException;
use UsamamuneerChaudhary\Daftravel\Exceptions\ValidationException;
use UsamamuneerChaudhary\Daftravel\Exceptions\RateLimitException;
use UsamamuneerChaudhary\Daftravel\Exceptions\ApiException;

/**
 * Basic Usage Example
 * 
 * Note: The format parameter is automatically handled by the client.
 * All endpoints default to JSON format (.json) as per the Daftra API specification.
 * The actual API calls will use the appropriate format based on the endpoint structure.
 */

// Initialize the Daftra client
$config = [
    'api_url' => 'https://api.daftra.com/v2',
    'api_key' => 'your-api-key-here',
    'timeout' => 30,
    'retry' => [
        'times' => 3,
        'delay' => 1000,
    ],
    'cache' => [
        'enabled' => true,
        'ttl' => 3600,
        'prefix' => 'daftra_',
    ],
    'logging' => [
        'enabled' => true,
        'level' => 'info',
    ],
    'default_headers' => [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
    ],
];

$daftra = new Daftravel($config);

try {
    // Example 1: Get all products with pagination
    echo "=== Getting all products ===\n";
    $products = $daftra->products()->paginate(1, 20);
    echo "Found " . count($products['data'] ?? []) . " products\n";
    echo "Total pages: " . ($products['meta']['last_page'] ?? 1) . "\n\n";

    // Example 1b: Get products with custom parameters
    echo "=== Getting products with custom parameters ===\n";
    $customProducts = $daftra->products()->all(['limit' => 10, 'page' => 1]);
    echo "Found " . count($customProducts['data'] ?? []) . " products with custom limit\n\n";

    // Example 3: Create a new product
    echo "=== Creating a new product ===\n";
    $newProduct = $daftra->products()->create([
        'name' => 'Sample Product',
        'price' => 99.99,
        'stock' => 10,
        'description' => 'A sample product created via API',
        'category_id' => 1,
    ]);
    echo "Created product with ID: " . $newProduct['data']['id'] . "\n\n";

    // Example 4: Get all customers
    echo "=== Getting all customers ===\n";
    $customers = $daftra->customers()->all();
    echo "Found " . count($customers['data'] ?? []) . " customers\n\n";

    // Example 5: Create a new customer
    echo "=== Creating a new customer ===\n";
    $newCustomer = $daftra->customers()->create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '+1234567890',
        'address' => '123 Main St, City, State',
        'company' => 'Acme Corp',
    ]);
    echo "Created customer with ID: " . $newCustomer['data']['id'] . "\n\n";

    // Example 6: Create an invoice
    echo "=== Creating an invoice ===\n";
    $newInvoice = $daftra->invoices()->create([
        'customer_id' => $newCustomer['data']['id'],
        'issue_date' => date('Y-m-d'),
        'due_date' => date('Y-m-d', strtotime('+30 days')),
        'items' => [
            [
                'product_id' => $newProduct['data']['id'],
                'quantity' => 2,
                'price' => 99.99,
            ],
        ],
        'notes' => 'Sample invoice created via API',
    ]);
    echo "Created invoice with ID: " . $newInvoice['data']['id'] . "\n\n";

    // Example 7: Get customer details
    echo "=== Getting customer details ===\n";
    $customerDetails = $daftra->customers()->find($newCustomer['data']['id']);
    echo "Customer name: " . ($customerDetails['data']['name'] ?? 'N/A') . "\n";
    echo "Customer email: " . ($customerDetails['data']['email'] ?? 'N/A') . "\n\n";

    // Example 8: Get inventory report
    echo "=== Getting inventory report ===\n";
    $inventory = $daftra->inventory()->all();
    echo "Inventory items: " . count($inventory['data'] ?? []) . "\n\n";

    // Example 9: Get stores
    echo "=== Getting stores ===\n";
    $stores = $daftra->stores()->all();
    echo "Found " . count($stores['data'] ?? []) . " stores\n\n";

    // Example 10: Get site information
    echo "=== Getting site information ===\n";
    $siteInfo = $daftra->siteInfo()->all();
    echo "Site info records: " . count($siteInfo['data'] ?? []) . "\n\n";

    // Example 11: Get categories
    echo "=== Getting categories ===\n";
    $categories = $daftra->categories()->all();
    echo "Found " . count($categories['data'] ?? []) . " categories\n\n";

    // Example 12: Update a product
    echo "=== Updating a product ===\n";
    $updatedProduct = $daftra->products()->update($newProduct['data']['id'], [
        'name' => 'Updated Sample Product',
        'price' => 149.99,
    ]);
    echo "Updated product name: " . ($updatedProduct['data']['name'] ?? 'N/A') . "\n\n";

    echo "All examples completed successfully!\n";

} catch (AuthenticationException $e) {
    echo "Authentication Error: " . $e->getMessage() . "\n";
    echo "Please check your API key and credentials.\n";
} catch (ValidationException $e) {
    echo "Validation Error: " . $e->getMessage() . "\n";
    echo "Validation errors: " . json_encode($e->getErrors()) . "\n";
} catch (RateLimitException $e) {
    echo "Rate Limit Error: " . $e->getMessage() . "\n";
    echo "Retry after: " . $e->getRetryAfter() . " seconds\n";
} catch (ApiException $e) {
    echo "API Error: " . $e->getMessage() . "\n";
    echo "HTTP Status Code: " . $e->getStatusCode() . "\n";
} catch (Exception $e) {
    echo "Unexpected Error: " . $e->getMessage() . "\n";
    echo "Type: " . get_class($e) . "\n";
}