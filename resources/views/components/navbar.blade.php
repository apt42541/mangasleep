<nav class="navbar navbar-expand-sm navbar-dark bg-dark py-2 bg-custom-2 ">
    <div class="container px-3">
        <a class="navbar-brand" href="/">แปลจนเมื่อย</a>
        <button class="navbar-toggler" type="button" style="background:#000;"data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
            <ul class="navbar-nav ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Member @auth() ({{ Auth::user()->username}} || {{ auth()->user()->point }} &#3647;) @endauth()
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @auth()
                
                        @if(Auth::user()->member_type == 2)
                        <li><a class="dropdown-item" href="/systemPanel">ระบบหลังบ้าน</a></li>
                        @endif
                        <li><a class="dropdown-item" href="/member/reset-password">รีเซ็ทรหัสผ่าน</a></li>
                        <li><a class="dropdown-item" href="/member/payment">เติมเงิน</a></li>
                        <li><a class="dropdown-item" href="/member/history-payment">ประวัติการเติมเงิน</a></li>
                        <li><a class="dropdown-item" href="/member/history-buy">ประวัติการซื้อตอน</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @endauth()
                        @auth()
                        <li><a class="dropdown-item" href="/member/logout">ออกจากระบบ</a></li>
                        @endauth()
                        @guest
                        <li><a class="dropdown-item" href="/member/login">เข้าสู่ระบบ</a></li>
                        <li><a class="dropdown-item" href="/member/register">ลงทะเบียน</a></li>
                        <li><a class="dropdown-item" href="/member/forgot">ลืมรหัสผ่าน</a></li>
                        @endguest
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>