<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Request\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function index()
    {
        $main_menu = 'subscriptions';
        $sub_menu = '';
        $subscriptions = Subscription::paginate(10);
        return view('admin.subscriptions.index', compact('main_menu', 'sub_menu', 'subscriptions'));
    }

    public function delete(Request $request, Subscription $subscription)
    {
        $subscription->delete();
        return redirect()->back()->with(['success' => trans('succes_messages.subscription_delete_successfully')]);
    }
}
