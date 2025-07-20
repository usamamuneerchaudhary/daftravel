# Daftravel - Laravel Package for Daftra API

A comprehensive Laravel package for integrating with the Daftra API. This package provides a clean, fluent interface for all Daftra API endpoints including products, customers, invoices, purchases, payments, and more.

## Features

- **Complete API Coverage**: All Daftra API endpoints are supported
- **Laravel Integration**: Native Laravel service provider and facade
- **Error Handling**: Comprehensive exception handling with specific error types
- **Caching**: Built-in caching support for GET requests
- **Retry Logic**: Automatic retry mechanism for failed requests
- **Logging**: Configurable request/response logging
- **Testing**: Full test coverage with PHPUnit
- **Type Safety**: Well-structured services with consistent interfaces

## Installation

Install the package via Composer:

```bash
composer require usamamuneerchaudhary/daftravel
```

Publish the configuration file:

```bash
php artisan vendor:publish --provider="UsamamuneerChaudhary\Daftravel\DaftravelServiceProvider" --tag="daftravel-config"
```

## Configuration

Add your Daftra API credentials to your `.env` file:

```env
DAFTRA_API_KEY=your-api-key-here
DAFTRA_API_URL=https://api.daftra.com/v2
DAFTRA_TIMEOUT=30
```

## Usage

### Using the Facade

```php
use Daftravel;

// Get all products
$products = Daftravel::products()->all();

// Find a specific product
$product = Daftravel::products()->find(1);

// Create a new product
$product = Daftravel::products()->create([
    'name' => 'New Product',
    'price' => 99.99,
    'stock' => 10,
]);

// Update a product
$product = Daftravel::products()->update(1, [
    'name' => 'Updated Product',
    'price' => 149.99,
]);

// Delete a product
Daftravel::products()->delete(1);

// Paginate results
$products = Daftravel::products()->paginate(1, 20);
```

### Using Dependency Injection

```php
use UsamamuneerChaudhary\Daftravel\Daftravel;

class ProductController extends Controller
{
    protected $daftravel;

    public function __construct(Daftravel $daftravel)
    {
        $this->daftravel = $daftravel;
    }

    public function index()
    {
        $products = $this->daftravel->products()->all();
        return response()->json($products);
    }
}
```

## Available Services

All services support the following basic CRUD operations:

- `all()` - Get all records
- `find($id)` - Find a specific record by ID
- `create($data)` - Create a new record
- `update($id, $data)` - Update an existing record
- `delete($id)` - Delete a record
- `paginate($page, $limit)` - Paginate results

**Note:** Search functionality varies by endpoint. Some endpoints may support search via query parameters, while others may not. Check the [official Daftra API documentation](https://azmart.daftra.com/api_docs/v2) for endpoint-specific search capabilities.

### Query Parameters

#### Common Parameters (Most Endpoints)
- `limit` - Number of records per page (integer [1..1000], default: 20)
- `page` - Page number (integer >= 1, default: 1)

#### Path Parameters
- `format` - Format of the output (string, default: ".json") - **Only for GET operations**

#### Endpoint-Specific Parameters
Each endpoint may support additional parameters. Check the [official Daftra API documentation](https://azmart.daftra.com/api_docs/v2) for complete parameter lists.

**Examples:**

```php
// Get all products (defaults to JSON format)
$products = Daftravel::products()->all();

// Get products with pagination
$products = Daftravel::products()->paginate(1, 20);

// Get products with custom parameters
$products = Daftravel::products()->all([
    'limit' => 10,
    'page' => 2
]);

// Additional parameters (check API docs for specific endpoints)
$products = Daftravel::products()->all([
    'category_id' => 1,
    'status' => 'active'
]);
```

**Note:** The format parameter is automatically handled by the client for GET operations. All GET endpoints default to JSON format (`.json`). POST, PUT, and DELETE operations do not use the format parameter.

### Supported Endpoints

The following endpoints are supported by this package. Each endpoint supports basic CRUD operations (all, find, create, update, delete):

| Endpoint | Service Method | Common Parameters |
|----------|----------------|-------------------|
| `/products` | `products()` | limit, page |
| `/clients` | `customers()` | limit, page |
| `/invoices` | `invoices()` | limit, page |
| `/categories` | `categories()` | limit, page |
| `/suppliers` | `suppliers()` | limit, page |
| `/stores` | `stores()` | limit, page |
| `/purchases` | `purchases()` | limit, page |
| `/payments` | `payments()` | limit, page |
| `/expenses` | `expenses()` | limit, page |
| `/reports` | `reports()` | limit, page |
| `/settings` | `settings()` | limit, page |
| `/users` | `users()` | limit, page |
| `/taxes` | `taxes()` | limit, page |
| `/currencies` | `currencies()` | limit, page |
| `/price_lists` | `priceLists()` | limit, page |
| `/inventory` | `inventory()` | limit, page |
| `/transactions` | `transactions()` | limit, page |
| `/client_appointments` | `appointments()` | limit, page |
| `/follow_ups` | `followUps()` | limit, page |
| `/notes` | `notes()` | limit, page |
| `/time_tracking` | `timeTracking()` | limit, page |
| `/work_orders` | `workOrders()` | limit, page |
| `/credit_notes` | `creditNotes()` | limit, page |
| `/refund_receipts` | `refundReceipts()` | limit, page |
| `/client_payments` | `clientPayments()` | limit, page |
| `/journals` | `journals()` | limit, page |
| `/incomes` | `incomes()` | limit, page |
| `/purchase_refunds` | `purchaseRefunds()` | limit, page |
| `/stock_transactions` | `stockTransactions()` | limit, page |
| `/treasuries` | `treasuries()` | limit, page |
| `/client_attendance` | `clientAttendance()` | limit, page |
| `/site_info` | `siteInfo()` | limit, page |
| `/listing` | `listings()` | limit, page |

**Important:** Each endpoint may support additional parameters beyond the common ones listed above. Always check the [official Daftra API documentation](https://azmart.daftra.com/api_docs/v2) for the complete list of parameters supported by each endpoint.

### Products

```php
// Basic CRUD operations
$products = Daftravel::products()->all();
$product = Daftravel::products()->find(1);
$product = Daftravel::products()->create($data);
$product = Daftravel::products()->update(1, $data);
Daftravel::products()->delete(1);

// Pagination and filtering
$products = Daftravel::products()->paginate(1, 20);
```

### Customers

```php
// Basic CRUD operations
$customers = Daftravel::customers()->all();
$customer = Daftravel::customers()->find(1);
$customer = Daftravel::customers()->create($data);
$customer = Daftravel::customers()->update(1, $data);
Daftravel::customers()->delete(1);

// Pagination and filtering
$customers = Daftravel::customers()->paginate(1, 20);
```

### Invoices

```php
// Basic CRUD operations
$invoices = Daftravel::invoices()->all();
$invoice = Daftravel::invoices()->find(1);
$invoice = Daftravel::invoices()->create($data);
$invoice = Daftravel::invoices()->update(1, $data);
Daftravel::invoices()->delete(1);

// Pagination and filtering
$invoices = Daftravel::invoices()->paginate(1, 20);
```

### Categories

```php
// Basic CRUD operations
$categories = Daftravel::categories()->all();
$category = Daftravel::categories()->find(1);
$category = Daftravel::categories()->create($data);
$category = Daftravel::categories()->update(1, $data);
Daftravel::categories()->delete(1);
```

### Suppliers

```php
// Basic CRUD operations
$suppliers = Daftravel::suppliers()->all();
$supplier = Daftravel::suppliers()->find(1);
$supplier = Daftravel::suppliers()->create($data);
$supplier = Daftravel::suppliers()->update(1, $data);
Daftravel::suppliers()->delete(1);
```

### Stores

```php
// Basic CRUD operations
$stores = Daftravel::stores()->all();
$store = Daftravel::stores()->find(1);
$store = Daftravel::stores()->create($data);
$store = Daftravel::stores()->update(1, $data);
Daftravel::stores()->delete(1);
```

### Purchases

```php
// Basic CRUD operations
$purchases = Daftravel::purchases()->all();
$purchase = Daftravel::purchases()->find(1);
$purchase = Daftravel::purchases()->create($data);
$purchase = Daftravel::purchases()->update(1, $data);
Daftravel::purchases()->delete(1);
```

### Payments

```php
// Basic CRUD operations
$payments = Daftravel::payments()->all();
$payment = Daftravel::payments()->find(1);
$payment = Daftravel::payments()->create($data);
$payment = Daftravel::payments()->update(1, $data);
Daftravel::payments()->delete(1);
```

### Expenses

```php
// Basic CRUD operations
$expenses = Daftravel::expenses()->all();
$expense = Daftravel::expenses()->find(1);
$expense = Daftravel::expenses()->create($data);
$expense = Daftravel::expenses()->update(1, $data);
Daftravel::expenses()->delete(1);
```

### Reports

```php
// Basic CRUD operations
$reports = Daftravel::reports()->all();
$report = Daftravel::reports()->find(1);
$report = Daftravel::reports()->create($data);
$report = Daftravel::reports()->update(1, $data);
Daftravel::reports()->delete(1);
```

### Settings

```php
// Basic CRUD operations
$settings = Daftravel::settings()->all();
$setting = Daftravel::settings()->find(1);
$setting = Daftravel::settings()->create($data);
$setting = Daftravel::settings()->update(1, $data);
Daftravel::settings()->delete(1);
```

### Users

```php
// Basic CRUD operations
$users = Daftravel::users()->all();
$user = Daftravel::users()->find(1);
$user = Daftravel::users()->create($data);
$user = Daftravel::users()->update(1, $data);
Daftravel::users()->delete(1);
```

### Taxes

```php
// Basic CRUD operations
$taxes = Daftravel::taxes()->all();
$tax = Daftravel::taxes()->find(1);
$tax = Daftravel::taxes()->create($data);
$tax = Daftravel::taxes()->update(1, $data);
Daftravel::taxes()->delete(1);
```

### Currencies

```php
// Basic CRUD operations
$currencies = Daftravel::currencies()->all();
$currency = Daftravel::currencies()->find(1);
$currency = Daftravel::currencies()->create($data);
$currency = Daftravel::currencies()->update(1, $data);
Daftravel::currencies()->delete(1);
```

### Price Lists

```php
// Basic CRUD operations
$priceLists = Daftravel::priceLists()->all();
$priceList = Daftravel::priceLists()->find(1);
$priceList = Daftravel::priceLists()->create($data);
$priceList = Daftravel::priceLists()->update(1, $data);
Daftravel::priceLists()->delete(1);
```

### Inventory

```php
// Basic CRUD operations
$inventory = Daftravel::inventory()->all();
$item = Daftravel::inventory()->find(1);
$item = Daftravel::inventory()->create($data);
$item = Daftravel::inventory()->update(1, $data);
Daftravel::inventory()->delete(1);
```

### Transactions

```php
// Basic CRUD operations
$transactions = Daftravel::transactions()->all();
$transaction = Daftravel::transactions()->find(1);
$transaction = Daftravel::transactions()->create($data);
$transaction = Daftravel::transactions()->update(1, $data);
Daftravel::transactions()->delete(1);
```

### Appointments

```php
// Basic CRUD operations
$appointments = Daftravel::appointments()->all();
$appointment = Daftravel::appointments()->find(1);
$appointment = Daftravel::appointments()->create($data);
$appointment = Daftravel::appointments()->update(1, $data);
Daftravel::appointments()->delete(1);
```

### Follow-ups

```php
// Basic CRUD operations
$followUps = Daftravel::followUps()->all();
$followUp = Daftravel::followUps()->find(1);
$followUp = Daftravel::followUps()->create($data);
$followUp = Daftravel::followUps()->update(1, $data);
Daftravel::followUps()->delete(1);
```

### Notes

```php
// Basic CRUD operations
$notes = Daftravel::notes()->all();
$note = Daftravel::notes()->find(1);
$note = Daftravel::notes()->create($data);
$note = Daftravel::notes()->update(1, $data);
Daftravel::notes()->delete(1);
```

### Time Tracking

```php
// Basic CRUD operations
$timeEntries = Daftravel::timeTracking()->all();
$timeEntry = Daftravel::timeTracking()->find(1);
$timeEntry = Daftravel::timeTracking()->create($data);
$timeEntry = Daftravel::timeTracking()->update(1, $data);
Daftravel::timeTracking()->delete(1);
```

### Work Orders

```php
// Basic CRUD operations
$workOrders = Daftravel::workOrders()->all();
$workOrder = Daftravel::workOrders()->find(1);
$workOrder = Daftravel::workOrders()->create($data);
$workOrder = Daftravel::workOrders()->update(1, $data);
Daftravel::workOrders()->delete(1);
```

### Credit Notes

```php
// Basic CRUD operations
$creditNotes = Daftravel::creditNotes()->all();
$creditNote = Daftravel::creditNotes()->find(1);
$creditNote = Daftravel::creditNotes()->create($data);
$creditNote = Daftravel::creditNotes()->update(1, $data);
Daftravel::creditNotes()->delete(1);
```

### Refund Receipts

```php
// Basic CRUD operations
$refundReceipts = Daftravel::refundReceipts()->all();
$refundReceipt = Daftravel::refundReceipts()->find(1);
$refundReceipt = Daftravel::refundReceipts()->create($data);
$refundReceipt = Daftravel::refundReceipts()->update(1, $data);
Daftravel::refundReceipts()->delete(1);
```

### Client Payments

```php
// Basic CRUD operations
$clientPayments = Daftravel::clientPayments()->all();
$clientPayment = Daftravel::clientPayments()->find(1);
$clientPayment = Daftravel::clientPayments()->create($data);
$clientPayment = Daftravel::clientPayments()->update(1, $data);
Daftravel::clientPayments()->delete(1);
```

### Journals

```php
// Basic CRUD operations
$journals = Daftravel::journals()->all();
$journal = Daftravel::journals()->find(1);
$journal = Daftravel::journals()->create($data);
$journal = Daftravel::journals()->update(1, $data);
Daftravel::journals()->delete(1);
```

### Incomes

```php
// Basic CRUD operations
$incomes = Daftravel::incomes()->all();
$income = Daftravel::incomes()->find(1);
$income = Daftravel::incomes()->create($data);
$income = Daftravel::incomes()->update(1, $data);
Daftravel::incomes()->delete(1);
```

### Purchase Refunds

```php
// Basic CRUD operations
$purchaseRefunds = Daftravel::purchaseRefunds()->all();
$purchaseRefund = Daftravel::purchaseRefunds()->find(1);
$purchaseRefund = Daftravel::purchaseRefunds()->create($data);
$purchaseRefund = Daftravel::purchaseRefunds()->update(1, $data);
Daftravel::purchaseRefunds()->delete(1);
```

### Stock Transactions

```php
// Basic CRUD operations
$stockTransactions = Daftravel::stockTransactions()->all();
$stockTransaction = Daftravel::stockTransactions()->find(1);
$stockTransaction = Daftravel::stockTransactions()->create($data);
$stockTransaction = Daftravel::stockTransactions()->update(1, $data);
Daftravel::stockTransactions()->delete(1);
```

### Treasuries

```php
// Basic CRUD operations
$treasuries = Daftravel::treasuries()->all();
$treasury = Daftravel::treasuries()->find(1);
$treasury = Daftravel::treasuries()->create($data);
$treasury = Daftravel::treasuries()->update(1, $data);
Daftravel::treasuries()->delete(1);
```

### Client Attendance

```php
// Basic CRUD operations
$attendanceLogs = Daftravel::clientAttendance()->all();
$attendanceLog = Daftravel::clientAttendance()->find(1);
$attendanceLog = Daftravel::clientAttendance()->create($data);
$attendanceLog = Daftravel::clientAttendance()->update(1, $data);
Daftravel::clientAttendance()->delete(1);
```

### Site Info

```php
// Basic CRUD operations
$siteInfo = Daftravel::siteInfo()->all();
$info = Daftravel::siteInfo()->find(1);
$info = Daftravel::siteInfo()->create($data);
$info = Daftravel::siteInfo()->update(1, $data);
Daftravel::siteInfo()->delete(1);
```

### Listings

```php
// Basic CRUD operations
$listings = Daftravel::listings()->all();
$listing = Daftravel::listings()->find(1);
$listing = Daftravel::listings()->create($data);
$listing = Daftravel::listings()->update(1, $data);
Daftravel::listings()->delete(1);
```

## Error Handling

The package provides specific exception classes for different error scenarios:

```php
use UsamamuneerChaudhary\Daftravel\Exceptions\AuthenticationException;
use UsamamuneerChaudhary\Daftravel\Exceptions\ValidationException;
use UsamamuneerChaudhary\Daftravel\Exceptions\RateLimitException;
use UsamamuneerChaudhary\Daftravel\Exceptions\ApiException;

try {
    $products = Daftravel::products()->all();
} catch (AuthenticationException $e) {
    // Handle authentication error
    echo "Authentication failed: " . $e->getMessage();
} catch (ValidationException $e) {
    // Handle validation errors
    $errors = $e->getErrors();
    foreach ($errors as $field => $messages) {
        echo "Field {$field}: " . implode(', ', $messages);
    }
} catch (RateLimitException $e) {
    // Handle rate limit
    $retryAfter = $e->getRetryAfter();
    echo "Rate limit exceeded. Retry after: " . $retryAfter . " seconds";
} catch (ApiException $e) {
    // Handle general API errors
    echo "API error: " . $e->getMessage();
}
```

## Configuration Options

The package provides extensive configuration options:

```php
return [
    'api_url' => env('DAFTRA_API_URL', 'https://api.daftra.com/v2'),
    'api_key' => env('DAFTRA_API_KEY'),
    'timeout' => env('DAFTRA_TIMEOUT', 30),
    
    'retry' => [
        'times' => env('DAFTRA_RETRY_TIMES', 3),
        'delay' => env('DAFTRA_RETRY_DELAY', 1000),
    ],
    
    'cache' => [
        'enabled' => env('DAFTRA_CACHE_ENABLED', true),
        'ttl' => env('DAFTRA_CACHE_TTL', 3600),
        'prefix' => env('DAFTRA_CACHE_PREFIX', 'daftra_'),
    ],
    
    'logging' => [
        'enabled' => env('DAFTRA_LOGGING_ENABLED', true),
        'level' => env('DAFTRA_LOGGING_LEVEL', 'info'),
    ],
];
```

## Testing

Run the tests with:

```bash
composer test
```

Or run PHPUnit directly:

```bash
vendor/bin/phpunit
```

## Requirements

- PHP 8.2+
- Laravel 11.0+ or 12.0+
- Guzzle HTTP 7.0+

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email the author instead of using the issue tracker.

## Credits

- [Usama Muneer Chaudhary](https://github.com/usamamuneerchaudhary)
- [All Contributors](../../contributors)

## Changelog

Please see [CHANGELOG.md](CHANGELOG.md) for more information on what has changed recently.