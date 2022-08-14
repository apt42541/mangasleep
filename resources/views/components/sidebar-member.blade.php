<div class="col-lg-3">
    <div class="navbar-expand-lg navbar-expand-lg-collapse-block navbar-light">
        <div id="sidebarNav" class=" navbar-vertical">
            <div class="card mb-5">
                <div class="card-body">
                    <div class=" d-lg-block text-center mb-5">
                        <h4 class="card-title">แปลจนเมื่อย</h4>
                        <p class="card-text font-size-1"></p>
                    </div>
                    <h6 class="text-cap small">บัญชี</h6>
                    <ul class="nav nav-sub nav-sm nav-tabs nav-list-y-2 mb-4">
                        <li class="nav-item"><a class="nav-link mr15rem {{ basename(request()->path()) == 'reset-password' ? 'active' : '' }}" href="/member/reset-password"><i class="fas fa-id-card nav-icon"></i> ข้อมูลผู้ใช้</a></li>
                        <li class="nav-item"><a class="nav-link mr15rem {{ basename(request()->path()) == 'history-buy' ? 'active' : '' }}" href="/member/history-buy"><i class="fas fa-shield-alt nav-icon"></i> ประวัติการซื้อตอน</a></li>
                    </ul>
                    @if(Auth::user()->member_type == '2')
                    <h6 class="text-cap small">ผู้ดูแล</h6>
                    <ul class="nav nav-sub nav-sm nav-tabs nav-list-y-2 mb-4 ">
                        <li class="nav-item"><a class="nav-link mr15rem {{ basename(request()->path()) == 'systemPanel' ? 'active' : '' }}" href="/systemPanel"><i class="fas fa-shopping-basket nav-icon"></i> <!-- -->กาตูนทั้งหมด</a></li>
                        <li class="nav-item"><a class="nav-link mr15rem {{ basename(request()->path()) == 'verifyPayment' ? 'active' : '' }}" href="/systemPanel/verifyPayment"><i class="fas fa-shopping-basket nav-icon"></i> <!-- -->ตรวจสอบการโอนเงิน</a></li>
                        <li class="nav-item"><a class="nav-link mr15rem {{ basename(request()->path()) == 'reportMonthlyPay' ? 'active' : '' }}" href="/systemPanel/reportMonthlyPay"><i class="fas fa-shopping-basket nav-icon"></i> <!-- -->รายงานรายรับของแต่ละเดือน</a></li>
                        <li class="nav-item"><a class="nav-link mr15rem {{ basename(request()->path()) == 'reportBuy' ? 'active' : '' }}" href="/systemPanel/reportBuy"><i class="fas fa-shopping-basket nav-icon"></i> <!-- -->รายงานรายยอดสั่งซื้อ</a></li>

                    </ul>
                    @endif
                    <h6 class="text-cap small">เติมเงิน</h6>
                    <ul class="nav nav-sub nav-sm nav-tabs nav-list-y-2 mb-4">
                        <li class="nav-item"><a class="nav-link mr15rem " href="/member/payment">
                                <i class="fas fa-shopping-basket nav-icon"></i>เติมเงิน</a>
                        </li>
                        <li class="nav-item"><a class="nav-link mr15rem {{  basename(request()->path()) == 'history-payment' ? 'active' : '' }} " href="/member/history-payment">
                                <i class="fas fa-shopping-basket nav-icon"></i>ประวัติการเติมเงิน</a>
                        </li>
                    </ul>

                    <div class="d-lg-block">
                        <div class="dropdown-divider"></div>
                        <ul class="nav nav-sub nav-sm nav-tabs nav-list-y-2">
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="/member/logout">
                                    <i class="fas fa-sign-out-alt nav-icon"></i>
                                    Log out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>