<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadStoreRequest;
use App\Services\LeadService;

class LeadController extends Controller
{
    public function __construct(protected LeadService $service)
    {
    }

    public function index()
    {
        return view('leads');
    }

    public function store(LeadStoreRequest $request)
    {
        try {
            $data = $this->service->store($request);
            return response()->json([
               'message' => 'lead was created',
               'data' => $data
            ]);
        } catch (\AmoCRM\Exception $e) {
            response()->json([
                $e->getCode(),
                $e->getMessage(),
            ]);
        }
    }
}
