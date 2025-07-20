# Changelog

All notable changes to `daftravel` will be documented in this file.

## [1.0.0] - 2024-01-20

### Added
- Initial release
- Complete Daftra API integration with proper format parameter support
- Support for all major endpoints: Products, Customers, Invoices, Purchases, Payments, etc.
- Comprehensive error handling with specific exception types
- Built-in caching for GET requests
- Automatic retry mechanism for failed requests
- Configurable logging
- Laravel service provider and facade
- Full test coverage
- Comprehensive documentation

### Features
- **Product Management**: CRUD operations, stock management, variants, price lists
- **Customer Management**: Customer profiles, balances, statements, addresses
- **Invoice Management**: Invoice creation, payments, PDF generation, recurring invoices
- **Purchase Management**: Purchase orders, approvals, receiving
- **Payment Processing**: Payment tracking, refunds, allocations
- **Expense Management**: Expense tracking, approvals, reimbursements
- **Reporting**: Sales, inventory, profit/loss, balance sheet reports
- **User Management**: User profiles, permissions, roles
- **Tax Management**: Tax calculations, reports, returns
- **Currency Management**: Exchange rates, conversions
- **Store Management**: Store CRUD operations
- **Transaction Management**: Accounting transactions, reconciliation

### Technical Features
- PSR-4 autoloading
- PHPUnit testing
- Guzzle HTTP client
- Laravel 10+ compatibility
- PHP 8.1+ support
- Comprehensive exception handling
- Request/response logging
- Caching support
- Retry logic
- Rate limiting handling
