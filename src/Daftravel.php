<?php

namespace UsamamuneerChaudhary\Daftravel;

use UsamamuneerChaudhary\Daftravel\Http\Client;
use UsamamuneerChaudhary\Daftravel\Services\ProductService;
use UsamamuneerChaudhary\Daftravel\Services\CategoryService;
use UsamamuneerChaudhary\Daftravel\Services\CustomerService;
use UsamamuneerChaudhary\Daftravel\Services\SupplierService;

use UsamamuneerChaudhary\Daftravel\Services\InvoiceService;
use UsamamuneerChaudhary\Daftravel\Services\PurchaseService;
use UsamamuneerChaudhary\Daftravel\Services\PaymentService;
use UsamamuneerChaudhary\Daftravel\Services\ExpenseService;
use UsamamuneerChaudhary\Daftravel\Services\ReportService;
use UsamamuneerChaudhary\Daftravel\Services\UserService;
use UsamamuneerChaudhary\Daftravel\Services\TaxService;
use UsamamuneerChaudhary\Daftravel\Services\CurrencyService;
use UsamamuneerChaudhary\Daftravel\Services\PriceListService;
use UsamamuneerChaudhary\Daftravel\Services\InventoryService;
use UsamamuneerChaudhary\Daftravel\Services\TransactionService;
use UsamamuneerChaudhary\Daftravel\Services\AppointmentService;
use UsamamuneerChaudhary\Daftravel\Services\FollowUpService;
use UsamamuneerChaudhary\Daftravel\Services\NoteService;
use UsamamuneerChaudhary\Daftravel\Services\TimeTrackingService;
use UsamamuneerChaudhary\Daftravel\Services\WorkOrderService;
use UsamamuneerChaudhary\Daftravel\Services\CreditNoteService;
use UsamamuneerChaudhary\Daftravel\Services\RefundReceiptService;
use UsamamuneerChaudhary\Daftravel\Services\ClientPaymentService;
use UsamamuneerChaudhary\Daftravel\Services\JournalService;
use UsamamuneerChaudhary\Daftravel\Services\IncomeService;
use UsamamuneerChaudhary\Daftravel\Services\PurchaseRefundService;
use UsamamuneerChaudhary\Daftravel\Services\StockTransactionService;
use UsamamuneerChaudhary\Daftravel\Services\StoreService;
use UsamamuneerChaudhary\Daftravel\Services\TreasuryService;
use UsamamuneerChaudhary\Daftravel\Services\ClientAttendanceService;
use UsamamuneerChaudhary\Daftravel\Services\SiteInfoService;
use UsamamuneerChaudhary\Daftravel\Services\ListingService;

class Daftravel
{
    protected Client $client;
    protected array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->client = new Client($config);
    }

    public function products(): ProductService
    {
        return new ProductService($this->client, $this->config);
    }

    public function categories(): CategoryService
    {
        return new CategoryService($this->client, $this->config);
    }

    public function customers(): CustomerService
    {
        return new CustomerService($this->client, $this->config);
    }

    public function suppliers(): SupplierService
    {
        return new SupplierService($this->client, $this->config);
    }

    public function invoices(): InvoiceService
    {
        return new InvoiceService($this->client, $this->config);
    }

    public function purchases(): PurchaseService
    {
        return new PurchaseService($this->client, $this->config);
    }

    public function payments(): PaymentService
    {
        return new PaymentService($this->client, $this->config);
    }

    public function expenses(): ExpenseService
    {
        return new ExpenseService($this->client, $this->config);
    }

    public function reports(): ReportService
    {
        return new ReportService($this->client, $this->config);
    }

    public function users(): UserService
    {
        return new UserService($this->client, $this->config);
    }

    public function taxes(): TaxService
    {
        return new TaxService($this->client, $this->config);
    }

    public function currencies(): CurrencyService
    {
        return new CurrencyService($this->client, $this->config);
    }

    public function priceLists(): PriceListService
    {
        return new PriceListService($this->client, $this->config);
    }

    public function inventory(): InventoryService
    {
        return new InventoryService($this->client, $this->config);
    }

    public function transactions(): TransactionService
    {
        return new TransactionService($this->client, $this->config);
    }

    public function appointments(): AppointmentService
    {
        return new AppointmentService($this->client, $this->config);
    }

    public function followUps(): FollowUpService
    {
        return new FollowUpService($this->client, $this->config);
    }

    public function notes(): NoteService
    {
        return new NoteService($this->client, $this->config);
    }

    public function timeTracking(): TimeTrackingService
    {
        return new TimeTrackingService($this->client, $this->config);
    }

    public function workOrders(): WorkOrderService
    {
        return new WorkOrderService($this->client, $this->config);
    }

    public function creditNotes(): CreditNoteService
    {
        return new CreditNoteService($this->client, $this->config);
    }

    public function refundReceipts(): RefundReceiptService
    {
        return new RefundReceiptService($this->client, $this->config);
    }

    public function clientPayments(): ClientPaymentService
    {
        return new ClientPaymentService($this->client, $this->config);
    }

    public function journals(): JournalService
    {
        return new JournalService($this->client, $this->config);
    }

    public function incomes(): IncomeService
    {
        return new IncomeService($this->client, $this->config);
    }

    public function purchaseRefunds(): PurchaseRefundService
    {
        return new PurchaseRefundService($this->client, $this->config);
    }

    public function stockTransactions(): StockTransactionService
    {
        return new StockTransactionService($this->client, $this->config);
    }

    public function stores(): StoreService
    {
        return new StoreService($this->client, $this->config);
    }

    public function treasuries(): TreasuryService
    {
        return new TreasuryService($this->client, $this->config);
    }

    public function clientAttendance(): ClientAttendanceService
    {
        return new ClientAttendanceService($this->client, $this->config);
    }

    public function siteInfo(): SiteInfoService
    {
        return new SiteInfoService($this->client, $this->config);
    }

    public function listings(): ListingService
    {
        return new ListingService($this->client, $this->config);
    }

    public function getClient(): Client
    {
        return $this->client;
    }
}
