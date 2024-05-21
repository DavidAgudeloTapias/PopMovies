<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Util\PdfReportGenerator;
use App\Util\ExcelReportGenerator;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MyAccountController extends Controller
{
    public function orders() : View
    {
        $viewData = [];
        $viewData["title"] = trans("app.account_controller.title");
        $viewData["subtitle"] = trans("app.account_controller.subtitle");
        $viewData["orders"] = Order::with(['items.movie'])->where('user_id', Auth::user()->getId())->get();
        return view('myaccount.orders')->with("viewData", $viewData);
    }

    protected $pdfReportGenerator;
    protected $excelReportGenerator;

    public function __construct(PdfReportGenerator $pdfReportGenerator, ExcelReportGenerator $excelReportGenerator)
    {
        $this->pdfReportGenerator = $pdfReportGenerator;
        $this->excelReportGenerator = $excelReportGenerator;
    }

    public function generatePdfReport(int $orderId) : Response
    {
        $order = Order::with('items.movie')->findOrFail($orderId);
        $data = $order->toArray();

        $filePath = $this->pdfReportGenerator->generate($data);

        return response()->download($filePath, 'order_' . $orderId . '.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function generateExcelReport(int $orderId) : Response
    {
        $order = Order::with('items.movie')->findOrFail($orderId);
        $data = $order->toArray();

        $filePath = $this->excelReportGenerator->generate($data);

        return response()->download($filePath, 'order_' . $orderId . '.xlsx', [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
    }
}
