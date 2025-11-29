<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class MemberDashboardController extends Controller
{
    public function updateBuyMembership()
    {
        $portal = new PortalController();
        $commonData = $portal->commonData(); // call method from PortalController
        $serviceAreaIdForPracticeLeftConten = 0;

        return view('front-end.member-dashboard.up-buy-membarship', compact(
            'commonData',
            'serviceAreaIdForPracticeLeftConten'
        ));
    }
    public function updateMemberProfile()
    {
        // You can fetch common data like on other pages
        $portal = new PortalController();
        $commonData = $portal->commonData();
        $serviceAreaIdForPracticeLeftConten = 0;

        return view(
            'front-end.member-dashboard.update-member-profile', // create this view
            compact('commonData', 'serviceAreaIdForPracticeLeftConten')
        );
    }
    public function buyMembership()
    {
        // Fetch common data if needed
        $portal = new PortalController();
        $commonData = $portal->commonData();
        $serviceAreaIdForPracticeLeftConten = 0;

        return view(
            'front-end.member-dashboard.buy-membership',
            compact('commonData', 'serviceAreaIdForPracticeLeftConten')
        );
    }
}
