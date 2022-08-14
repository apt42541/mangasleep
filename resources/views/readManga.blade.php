<x-layout>
    <div id="content" class="readercontent">
        <div class="wrapper">
            <div class="chapterbody">
                <div class="postarea">
                    <style>
                        img {
                            width: 100%;
                        }
                    </style>
                    <article>
                        <div class="headpost">
                            <h1 class="entry-title" itemprop="name"><?= $m->manga_name ?> Chapter <?= $c->chapter_slugs ?></h1>
                            <div class="allc">All chapters are in <a href="/comics/<?= $m->manga_slugs ?>"><?= $m->manga_name ?></a></div>
                        </div>


                        <div class="entry-content entry-content-single maincontent" itemprop="description">
                            <div class="chdesc">
                                <p>
                                    Read the latest manga <b><?= $m->manga_name ?> Chapter <?= $c->chapter_slugs ?> </b> at <b> แปลจนเมื่อย แฟนเพจ </b>. Manga <b> <?= $m->manga_name ?> </b> is always updated at <b> แปลจนเมื่อย แฟนเพจ </b>. Dont forget to read the other manga updates. A list of manga collections <b> แปลจนเมื่อย แฟนเพจ </b> is in the Manga List menu. </p>
                            </div>
                            <div class="chnav ctop">
                                <span class="selector slc l">
                                    <div class="nvx">
                                        <select name="chapter" id="chapter" onchange=" this.options[this.selectedIndex].value && window.open(this.options[this.selectedIndex].value,'_self')">
                                            <option value="" disabled="disabled" selected>Select Chapter</option>
                                            <?php foreach ($m->chaptersv1 as $cc) : ?>
                                                <option value="/comics/<?= $m->manga_slugs ?>/<?= $cc->chapter_slugs ?>">Chapter <?= $cc->chapter_slugs ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </span>
                                <span class="navlef">
                                    <span class="npv r">
                                        <div class="nextprev">
                                            <a class="ch-prev-btn  <?= $prev == '/' ? 'd-none' : ''; ?>" href="/comics/<?= $m->manga_slugs ?>/<?= $prev == '/' ? '' : $prev->chapter_slugs; ?>" rel="prev">
                                                <i class="fas fa-angle-left"></i> Prev
                                            </a>
                                            <a class="ch-next-btn <?= $next == '/' ? 'd-none' : ''; ?>" href="/comics/<?= $m->manga_slugs ?>/<?= $next == '/' ? '' : $next->chapter_slugs; ?>" rel="next">
                                                Next <i class="fas fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </span>
                                    <span class="amob nodlx">
                                    </span>
                                </span>
                            </div>
                            <div class="kln"></div>
                            <div id="readerarea" class="rdminimal">
                                @if(Session::has('msg'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>
                                @endif
                                <?php
                                $chap_id = $c->chapter_id;
                                if ($c->isFree != 0 and $c->isFree != 3) {
                                    if (!Auth::check()) {
                                        echo '<div class="alert alert-warning">';
                                        echo 'การ์ตูนยังไม่เปิดอ่านฟรี' . '<a href="/member/login"> คลิกที่นี่สำหรับล็อกอินเพื่อทำการจ่ายเงิน</a>';
                                        echo '</div>';
                                    } else {
                                        if ($buyed != null) {
                                ?> <img src="/images/credit02.jpg" alt="">
                                        <?php
                                            echo $c->chapter_post;
                                        } elseif (Auth::user()->member_type == "2") {
                                        ?> <img src="/images/credit02.jpg" alt="">
                                        <?php
                                            echo $c->chapter_post;
                                        } else {
                                            echo '<div class="alert alert-danger">';
                                        ?>
                                            การ์ตูนยังไม่เปิดอ่านฟรี หากจะอ่านในราคา {{$c->chapter_price}} &#3647;
                                            <a href="/member/buychapter/{{$chap_id }} " class="alert alert-danger text-dark" onclick="return confirm('คุณแน่ใจนะว่าจะทำการซื้อการ์ตูนตอนนี้')">
                                                คลิกที่นี่เพื่อซื้อ
                                            </a>
                                            <img src="/images/credit01.jpg" alt="">
                                    <?php

                                        }
                                    }
                                } else if ($c->isFree == 3 && Auth::check()) {
                                    ?> <img src="/images/credit02.jpg" alt="">
                                <?php
                                    echo $c->chapter_post;
                                } else if ($c->isFree == 0) {
                                ?> <img src="/images/credit02.jpg" alt="">
                                <?php
                                    echo $c->chapter_post;
                                } else {
                                    echo '<div class="alert alert-warning">';
                                    echo 'การ์ตูนเปิดอ่านฟรี' . '<a href="/member/login"> แต่จำเป็นต้องล็อกอินก่อน</a>';
                                    echo '</div>';
                                }

                                ?>
                                <img src="/images/credit.jpg" alt="">
                            </div>
                            <div class="kln"></div>
                            <div class="chnav cbot">
                                <span class="selector slc l">
                                    <div class="nvx">
                                        <select name="chapter" id="chapter" onchange=" this.options[this.selectedIndex].value && window.open(this.options[this.selectedIndex].value,'_self')">
                                            <option value="" disabled="disabled" selected>Select Chapter</option>
                                            <?php foreach ($m->chaptersv1 as $cc) : ?>
                                                <option value="/comics/<?= $m->manga_slugs ?>/<?= $cc->chapter_slugs ?>">Chapter <?= $cc->chapter_slugs ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </span>
                                <span class="amob">
                                    <span class="npv r">
                                        <div class="nextprev">
                                            <a class="ch-prev-btn <?= $prev == '/' ? 'd-none' : ''; ?>" href="/comics/<?= $m->manga_slugs ?>/<?= $prev == '/' ? '' : $prev->chapter_slugs; ?>" rel="prev">
                                                <i class="fas fa-angle-left"></i> Prev
                                            </a>
                                            <a class="ch-next-btn <?= $next == '/' ? 'd-none' : ''; ?>" href="/comics/<?= $m->manga_slugs ?>/<?= $next == '/' ? '' : $next->chapter_slugs; ?>" rel="next">
                                                Next <i class="fas fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="chaptertags" style="padding-top:10px;">
                            <p>tags: read manga <?= $m->manga_name ?> Chapter <?= $c->chapter_slugs ?>, comic<?= $m->manga_name ?> Chapter <?= $c->chapter_slugs ?>, read <?= $m->manga_name ?> Chapter <?= $c->chapter_slugs ?> online,<?= $m->manga_name ?> Chapter <?= $c->chapter_slugs ?> chapter,<?= $m->manga_name ?> Chapter <?= $c->chapter_slugs ?> chapter,<?= $m->manga_name ?> Chapter <?= $c->chapter_slugs ?> high quality, <?= $m->manga_name ?> Chapter <?= $c->chapter_slugs ?> manga scan,
                                <time class="entry-date" datetime="2022-05-19GMT+000017:08:53+0000" itemprop="datePublished" pubdate=""><?= $c->created_at ?></time>, <span itemprop="author">แปลจนเมื่อย</span>
                            </p>
                        </div>
                    </article>

                    <div id="comments" class="bixbox comments-area">
                        <div class="releases">
                            <h2><span>Comment</span></h2>
                        </div>
                        <div class="cmt commentx">
                            <div id="comments" class="comments-area">
                                <div id="disqus_thread"></div>
                                <div id="disqus_recommendations" style="margin-top: 12px;"></div>

                                <script defer="" type="text/javascript">
                                    (function() {
                                        var d = document,
                                            s = d.createElement('script');
                                        s.src = 'https://aeplcchnemuue-y.disqus.com/embed.js';
                                        s.setAttribute('data-timestamp', +new Date());
                                        (d.head || d.body).appendChild(s);
                                    })();
                                </script>
                                <noscript>Please enable JavaScript to view comments powered by Disqus.</noscript>
                            </div>
                            <div class="ai-viewport-1 ai-viewport-2" data-insertion="prepend" data-selector=".ai-insert-16-37145447" data-insertion-no-dbg="" data-code="PGRpdiBjbGFzcz0nY29kZS1ibG9jayBjb2RlLWJsb2NrLTE2JyBzdHlsZT0nbWFyZ2luOiA4cHggYXV0bzsgdGV4dC1hbGlnbjogY2VudGVyOyBkaXNwbGF5OiBibG9jazsgY2xlYXI6IGJvdGg7Jz4KPCEtLSBEZXNrdG9wLCBUYWJsZXQgLy8gRW5kIG9mIGNoYXB0ZXIgLS0+Cgo8IS0tIDxkaXYgY2xhc3M9InZtLXBsYWNlbWVudCIgZGF0YS1pZD0iNjFkZWQyN2M0NThlYzI1OTFjYTlhN2U0Ij48L2Rpdj4tLT4KCjxhIGhyZWY9Imh0dHBzOi8vd3d3LmFzdXJhc2NhbnMuY29tL2dvL3JlaW5jYXJuYXRpb24tb2YtdGhlLXN1aWNpZGFsLWJhdHRsZS1nb2QvIiB0YXJnZXQ9Il9ibGFuayIgcmVsPSJub29wZW5lciBub3JlZmVycmVyIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuYXN1cmFzY2Fucy5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMjIvMDQvc3VpY2lkYWxfYmFubmVyLnBuZyIgYWx0PSIiIHdpZHRoPSIxMzAwIiBoZWlnaHQ9IjYwMCIgY2xhc3M9ImFsaWdubm9uZSIgLz48L2Rpdj4K" data-block="16"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>