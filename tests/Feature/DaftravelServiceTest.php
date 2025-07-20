<?php

namespace UsamamuneerChaudhary\Daftravel\Tests\Feature;

use UsamamuneerChaudhary\Daftravel\Tests\TestCase;
use UsamamuneerChaudhary\Daftravel\Daftravel;
use UsamamuneerChaudhary\Daftravel\Services\ProductService;
use UsamamuneerChaudhary\Daftravel\Services\CustomerService;
use UsamamuneerChaudhary\Daftravel\Services\InvoiceService;
use UsamamuneerChaudhary\Daftravel\Services\CategoryService;
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

class DaftravelServiceTest extends TestCase
{
    protected $daftravel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->daftravel = app('daftravel');
    }

    public function testDaftravelServiceIsRegistered()
    {
        $this->assertInstanceOf(Daftravel::class, $this->daftravel);
    }

    public function testCanAccessProductService()
    {
        $productService = $this->daftravel->products();
        $this->assertInstanceOf(ProductService::class, $productService);
    }

    public function testCanAccessCustomerService()
    {
        $customerService = $this->daftravel->customers();
        $this->assertInstanceOf(CustomerService::class, $customerService);
    }

    public function testCanAccessInvoiceService()
    {
        $invoiceService = $this->daftravel->invoices();
        $this->assertInstanceOf(InvoiceService::class, $invoiceService);
    }

    public function testCanAccessCategoryService()
    {
        $categoryService = $this->daftravel->categories();
        $this->assertInstanceOf(CategoryService::class, $categoryService);
    }

    public function testCanAccessAppointmentService()
    {
        $appointmentService = $this->daftravel->appointments();
        $this->assertInstanceOf(AppointmentService::class, $appointmentService);
    }

    public function testCanAccessFollowUpService()
    {
        $followUpService = $this->daftravel->followUps();
        $this->assertInstanceOf(FollowUpService::class, $followUpService);
    }

    public function testCanAccessNoteService()
    {
        $noteService = $this->daftravel->notes();
        $this->assertInstanceOf(NoteService::class, $noteService);
    }

    public function testCanAccessTimeTrackingService()
    {
        $timeTrackingService = $this->daftravel->timeTracking();
        $this->assertInstanceOf(TimeTrackingService::class, $timeTrackingService);
    }

    public function testCanAccessWorkOrderService()
    {
        $workOrderService = $this->daftravel->workOrders();
        $this->assertInstanceOf(WorkOrderService::class, $workOrderService);
    }

    public function testCanAccessCreditNoteService()
    {
        $creditNoteService = $this->daftravel->creditNotes();
        $this->assertInstanceOf(CreditNoteService::class, $creditNoteService);
    }

    public function testCanAccessRefundReceiptService()
    {
        $refundReceiptService = $this->daftravel->refundReceipts();
        $this->assertInstanceOf(RefundReceiptService::class, $refundReceiptService);
    }

    public function testCanAccessClientPaymentService()
    {
        $clientPaymentService = $this->daftravel->clientPayments();
        $this->assertInstanceOf(ClientPaymentService::class, $clientPaymentService);
    }

    public function testCanAccessJournalService()
    {
        $journalService = $this->daftravel->journals();
        $this->assertInstanceOf(JournalService::class, $journalService);
    }

    public function testCanAccessIncomeService()
    {
        $incomeService = $this->daftravel->incomes();
        $this->assertInstanceOf(IncomeService::class, $incomeService);
    }

    public function testCanAccessPurchaseRefundService()
    {
        $purchaseRefundService = $this->daftravel->purchaseRefunds();
        $this->assertInstanceOf(PurchaseRefundService::class, $purchaseRefundService);
    }

    public function testCanAccessStockTransactionService()
    {
        $stockTransactionService = $this->daftravel->stockTransactions();
        $this->assertInstanceOf(StockTransactionService::class, $stockTransactionService);
    }

    public function testCanAccessStoreService()
    {
        $storeService = $this->daftravel->stores();
        $this->assertInstanceOf(StoreService::class, $storeService);
    }

    public function testCanAccessTreasuryService()
    {
        $treasuryService = $this->daftravel->treasuries();
        $this->assertInstanceOf(TreasuryService::class, $treasuryService);
    }

    public function testCanAccessClientAttendanceService()
    {
        $clientAttendanceService = $this->daftravel->clientAttendance();
        $this->assertInstanceOf(ClientAttendanceService::class, $clientAttendanceService);
    }

    public function testCanAccessSiteInfoService()
    {
        $siteInfoService = $this->daftravel->siteInfo();
        $this->assertInstanceOf(SiteInfoService::class, $siteInfoService);
    }

    public function testCanAccessListingService()
    {
        $listingService = $this->daftravel->listings();
        $this->assertInstanceOf(ListingService::class, $listingService);
    }

    public function testCanGetHttpClient()
    {
        $client = $this->daftravel->getClient();
        $this->assertInstanceOf(\UsamamuneerChaudhary\Daftravel\Http\Client::class, $client);
    }

    public function testFacadeWorks()
    {
        $daftravel = \Daftravel::products();
        $this->assertInstanceOf(ProductService::class, $daftravel);
    }

    public function testConfigurationIsLoaded()
    {
        $this->assertEquals('test-api-key', config('daftravel.api_key'));
        $this->assertEquals('https://api.daftra.com/v2', config('daftravel.api_url'));
        $this->assertEquals(30, config('daftravel.timeout'));
    }
}
