<?php

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

    'default_headers' => [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
    ],

    'endpoints' => [
        'products' => '/products',
        'categories' => '/categories',
        'customers' => '/clients',
        'suppliers' => '/suppliers',
        'warehouses' => '/stores',
        'invoices' => '/invoices',
        'purchases' => '/purchases',
        'payments' => '/payments',
        'expenses' => '/expenses',
        'reports' => '/reports',
        'users' => '/users',
        'taxes' => '/taxes',
        'currencies' => '/currencies',
        'price_lists' => '/price_lists',
        'inventory' => '/inventory',
        'transactions' => '/transactions',
        'appointments' => '/client_appointments',
        'follow_ups' => '/follow_up_actions',
        'notes' => '/notes',
        'time_tracking' => '/time_tracking',
        'work_orders' => '/work_orders',
        'credit_notes' => '/credit_notes',
        'refund_receipts' => '/refund_receipts',
        'client_payments' => '/client_payments',
        'journals' => '/journals',
        'incomes' => '/incomes',
        'purchase_refunds' => '/purchase_refunds',
        'stock_transactions' => '/stock_transactions',
        'stores' => '/stores',
        'treasuries' => '/treasuries',
        'client_attendance' => '/client-attendance-log',
        'site_info' => '/site_info',
        'listings' => '/listing',
    ],
];
