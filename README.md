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
- **Type Safety**: Well-structured models and services

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

### Products

```php
// Basic operations
$products = Daftravel::products()->all();
$product = Daftravel::products()->find(1);
$product = Daftravel::products()->create($data);
$product = Daftravel::products()->update(1, $data);
Daftravel::products()->delete(1);

// Product-specific operations
$products = Daftravel::products()->getByCategory(1);
$product = Daftravel::products()->getByBarcode('123456789');
$stock = Daftravel::products()->getStock(1);
Daftravel::products()->updateStock(1, 50);
$prices = Daftravel::products()->getPrices(1);
$variants = Daftravel::products()->getVariants(1);
```

### Customers

```php
// Basic operations
$customers = Daftravel::customers()->all();
$customer = Daftravel::customers()->find(1);
$customer = Daftravel::customers()->create($data);

// Customer-specific operations
$invoices = Daftravel::customers()->getInvoices(1);
$payments = Daftravel::customers()->getPayments(1);
$balance = Daftravel::customers()->getBalance(1);
$statement = Daftravel::customers()->getStatement(1);
$customer = Daftravel::customers()->getByEmail('customer@example.com');
```

### Invoices

```php
// Basic operations
$invoices = Daftravel::invoices()->all();
$invoice = Daftravel::invoices()->find(1);
$invoice = Daftravel::invoices()->create($data);

// Invoice-specific operations
$invoices = Daftravel::invoices()->getByCustomer(1);
$invoices = Daftravel::invoices()->getByStatus('paid');
$invoices = Daftravel::invoices()->getByDateRange('2023-01-01', '2023-12-31');
Daftravel::invoices()->markAsPaid(1);
Daftravel::invoices()->send(1);
$pdf = Daftravel::invoices()->getPdf(1);
```

### Categories

```php
$categories = Daftravel::categories()->all();
$tree = Daftravel::categories()->getTree();
$children = Daftravel::categories()->getChildren(1);
$products = Daftravel::categories()->getProducts(1);
```

### Suppliers

```php
$suppliers = Daftravel::suppliers()->all();
$purchases = Daftravel::suppliers()->getPurchases(1);
$balance = Daftravel::suppliers()->getBalance(1);
$statement = Daftravel::suppliers()->getStatement(1);
```

### Warehouses

```php
$warehouses = Daftravel::warehouses()->all();
$inventory = Daftravel::warehouses()->getInventory(1);
$stock = Daftravel::warehouses()->getStock(1);
Daftravel::warehouses()->transferStock(1, 2, $items);
```

### Purchases

```php
$purchases = Daftravel::purchases()->all();
$purchases = Daftravel::purchases()->getBySupplier(1);
Daftravel::purchases()->approve(1);
Daftravel::purchases()->receive(1, $items);
```

### Payments

```php
$payments = Daftravel::payments()->all();
$payments = Daftravel::payments()->getByCustomer(1);
$payments = Daftravel::payments()->getByDateRange('2023-01-01', '2023-12-31');
Daftravel::payments()->refund(1, 100.00);
```

### Expenses

```php
$expenses = Daftravel::expenses()->all();
$expenses = Daftravel::expenses()->getByCategory(1);
Daftravel::expenses()->approve(1);
Daftravel::expenses()->reimburse(1);
```

### Reports

```php
$salesReport = Daftravel::reports()->salesReport();
$inventoryReport = Daftravel::reports()->inventoryReport();
$profitLoss = Daftravel::reports()->profitLossReport();
$balanceSheet = Daftravel::reports()->balanceSheetReport();
```

### Settings

```php
$companySettings = Daftravel::settings()->getCompanySettings();
Daftravel::settings()->updateCompanySettings($data);
$taxSettings = Daftravel::settings()->getTaxSettings();
$invoiceSettings = Daftravel::settings()->getInvoiceSettings();
```

### Users

```php
$users = Daftravel::users()->all();
$profile = Daftravel::users()->getProfile();
Daftravel::users()->updateProfile($data);
$permissions = Daftravel::users()->getPermissions(1);
```

### Taxes

```php
$taxes = Daftravel::taxes()->all();
$taxes = Daftravel::taxes()->getByRate(15.0);
$calculation = Daftravel::taxes()->calculate($items);
$report = Daftravel::taxes()->getReport();
```

### Currencies

```php
$currencies = Daftravel::currencies()->all();
$rates = Daftravel::currencies()->getExchangeRates();
$conversion = Daftravel::currencies()->convert(100, 'USD', 'EUR');
```

### Price Lists

```php
$priceLists = Daftravel::priceLists()->all();
$products = Daftravel::priceLists()->getProducts(1);
Daftravel::priceLists()->addProduct(1, 1, 99.99);
```

### Inventory

```php
$inventory = Daftravel::inventory()->all();
$lowStock = Daftravel::inventory()->getLowStock();
$outOfStock = Daftravel::inventory()->getOutOfStock();
Daftravel::inventory()->adjustStock(1, 1, 10);
```

### Transactions

```php
$transactions = Daftravel::transactions()->all();
$transactions = Daftravel::transactions()->getByAccount(1);
$balance = Daftravel::transactions()->getBalance(1);
$accounts = Daftravel::transactions()->getAccounts();
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

- PHP 8.1+
- Laravel 10.0+
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