<?php

namespace App\Http\Controllers\frontend;

use App\Models\Menu; // Import Model Menu
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
        private function getPolicies(): array
        {
            return Menu::where('parent_id', 12)
                ->where('status', 1) // Lọc các menu đang hoạt động (nếu cần)
                ->orderBy('sort_order') // Sắp xếp theo thứ tự (nếu cần)
                ->get()
                ->toArray();
        }
    
        public function shippingPolicy()
        {
            $policies = $this->getPolicies();
            return view('policies.shipping', compact('policies'));
        }
    
        public function privacyPolicy()
        {
            $policies = $this->getPolicies();
            return view('policies.privacy', compact('policies'));
        }
    
        public function returnPolicy()
        {
            $policies = $this->getPolicies();
            return view('policies.return', compact('policies'));
        }
    
        public function paymentPolicy()
        {
            $policies = $this->getPolicies();
            return view('policies.payment', compact('policies'));
        }
    }