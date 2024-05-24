<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Interfaces\ReportGeneratorInterface;
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

    public function downloadReport(int $orderId, string $format) : Response
    {
        $order = Order::with('items.movie')->findOrFail($orderId);

        // Determinar el generador de reportes basado en el formato
        $reportGenerator = app()->make(ReportGeneratorInterface::class, ['format' => $format]);

        $filePath = $reportGenerator->downloadReport($order); // Pasa el objeto $order en lugar de un array

        $contentType = $format === 'pdf' ? 'application/pdf' : 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
        $fileExtension = $format === 'pdf' ? 'pdf' : 'xlsx';

        return response()->download($filePath, 'order_' . $orderId . '.' . $fileExtension, [
            'Content-Type' => $contentType,
        ]);
    }
}
