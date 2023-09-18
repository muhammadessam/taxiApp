<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function index()
    {
        $main_menu = 'subscriptions';
        $sub_menu = '';
        return view('admin.subscriptions.index', compact('main_menu', 'sub_menu'));
    }
}
