<x-layout>
    <div class="wrapper" style="transform: none;">

        <div class="postbody">
            <article id="post-96153" class="post-96153 hentry" itemscope="itemscope" itemtype="http://schema.org/CreativeWorkSeries">
                <div class="bixbox animefull my-3">
                    <div class="bigcontent nobigcover">
                        <div class="thumbook">
                            <div class="thumb" itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject">
                                <img width="423" height="612" src="<?= $data->manga_cover; ?>" class="attachment- size- wp-post-image" alt="แปลจนเมื่อย scans manhwa comic" loading="lazy" title="<?= $data->manga_name ?>" itemprop="image">
                            </div>
                            <div class="rt">
                                <div class="rating">
                                    <div class="rating-prc" itemscope="itemscope" itemprop="aggregateRating" itemtype="//schema.org/AggregateRating">
                                        <meta itemprop="worstRating" content="1">
                                        <meta itemprop="bestRating" content="10">
                                        <meta itemprop="ratingCount" content="10">
                                        <div class="rtp">
                                            <div class="rtb"><span style="width:{{ $data->manga_rating }}%"></span></div>
                                        </div>
                                        <div class="num" itemprop="ratingValue" content="{{ $data->manga_rating }}">{{ $data->manga_rating / 10 }}</div>
                                    </div>
                                </div>
                                <div class="tsinfo">
                                    <div class="imptdt">
                                        Status <i>Ongoing</i>
                                    </div>
                                    <div class="imptdt">
                                        Type <a>Manhua</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="infox">
                            <h1 class="entry-title" itemprop="name"><?= $data->manga_name ?></h1>

                            <div class="wd-full">
                                <h2>Synopsis <?= $data->manga_name ?></h2>
                                <div class="entry-content entry-content-single" itemprop="description">
                                    <div class="code-block code-block-18" style="margin: 8px 0; clear: both;">

                                        <div class="asurascans.rights">
                                            <img src="<?= $data->manga_cover ?>" style="display: none;" class="alignnone size-full asurascans" alt="แปลจนเมื่อย manhwa comic">
                                        </div>
                                    </div>
                                    <div class="ai-viewport-1" data-insertion="prepend" data-selector=".ai-insert-12-72871253" data-insertion-no-dbg=""></div>
                                    <p>&nbsp;</p>
                                    <p> <?= $data->manga_description ?></p>

                                </div>
                            </div>
                            <div class="flex-wrap">
                                <div class="fmed">
                                    <b>Released</b>
                                    <span>
                                        - </span>
                                </div>
                                <div class="fmed">
                                    <b>Author</b>
                                    <span>
                                        - </span>
                                </div>
                            </div>
                            <div class="flex-wrap">

                            </div>
                            <div class="flex-wrap">

                                <div class="fmed">
                                    <b>Posted By</b>
                                    <span itemprop="author" itemscope="" itemtype="https://schema.org/Person" class="author vcard">
                                        <i itemprop="name">แปลจนเมื่อย</i>
                                    </span>
                                </div>
                            </div>
                            <div class="flex-wrap">
                                <div class="fmed">
                                    <b>Posted On</b>
                                    <span>
                                        <time itemprop="datePublished" datetime="2022-04-28T13:11:22+00:00"> <?= $data->created_at->diffForHumans() ?></time>
                                    </span>
                                </div>
                                <div class="fmed">
                                    <b>Updated On</b>
                                    <span>
                                        <time itemprop="dateModified" datetime="2022-05-19T17:08:54+00:00"> <?= $data->updated_at->diffForHumans() ?></time>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="bixbox bxcl epcheck">
                    <div class="releases">
                        <h2>Chapter <?= $data->manga_name; ?></h2>
                    </div>
                    <div class="lastend">
                        <?php if ($data->chaptersv1 != []) : ?>
                        <?php else : ?>
                            <div class="inepcx">
                                <a href="/comics/<?= $data->manga_slugs ?>/<?= $data->getFirstChapters[0]->chapter_slugs ?>">
                                    <span>First Chapter</span>
                                    <span class="epcur epcurfirst">Chapter <?= $data->getFirstChapters[0]->chapter_slugs; ?></span>
                                </a>
                            </div>
                            <div class="inepcx">
                                <a href="/comics/<?= $data->manga_slugs ?>/<?= $data->getLastChapters[0]->chapter_slugs ?>">
                                    <span>New Chapter</span>
                                    <span class="epcur epcurlast">Chapter <?= $data->getLastChapters[0]->chapter_slugs; ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="search-chapter">
                        <input id="searchchapter" type="text" placeholder="Search Chapter. Example: 25 or 178" autocomplete="off">
                    </div>
                    <div class="eplister" id="chapterlist">
                        <ul class="clstyle">
                            <?php foreach ($data->chaptersv1 as $c) : ?>
                                <li data-num="{{ $c->chapter_slugs }}">
                                    <div class="chbox">
                                        <div class="eph-num">
                                            <a href="/comics/<?= $data->manga_slugs ?>/<?= $c->chapter_slugs ?>">
                                                <span class="chapternum">
                                                    @if($c->isFree == "1")
                                                    <i class="fa-solid fa-lock"></i>
                                                    @elseif($c->isFree == "3")
                                                    <i class="fa-solid fa-key"></i>
                                                    @endif
                                                    Chapter <?= $c->chapter_slugs ?></span>
                                                <span class="chapterdate"><?= $c->created_at->diffForHumans(); ?></span>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

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
                        <div class="" data-insertion="prepend" data-selector=".ai-insert-17-59791509" data-insertion-no-dbg="" data-code="PGRpdiBjbGFzcz0nY29kZS1ibG9jayBjb2RlLWJsb2NrLTE3JyBzdHlsZT0nbWFyZ2luOiA4cHggYXV0bzsgdGV4dC1hbGlnbjogY2VudGVyOyBkaXNwbGF5OiBibG9jazsgY2xlYXI6IGJvdGg7Jz4KPCEtLSBQaG9uZSAvLyBFbmQgb2YgY2hhcHRlciAtLT4KCjwhLS08ZGl2IGNsYXNzPSJ2bS1wbGFjZW1lbnQiIGRhdGEtaWQ9IjYxZGVkMWQ3NDU4ZWMyNTkxY2E5YTdlMCI+PC9kaXY+LS0+Cgo8ZGl2IGRhdGEtcHctbW9iaT0ibWVkX3JlY3RfYnRmIj48L2Rpdj4KCjwvZGl2Pgo=" data-block="17"></div>
                    </div>
                </div>


            </article>

        </div>
        <x-sidebar></x-sidebar>
        <script type="text/javascript">
            const input = document.getElementById("searchchapter");
            input.addEventListener("input", (v) => {

                const paragraphs = document.querySelectorAll('#chapterlist ul li');

                paragraphs.forEach(p => {
                    if (p.dataset.num != input.value && input.value != "") {
                        p.style.display = 'none';
                    } else {
                        p.style.display = 'block';
                    }
                });

            })


            jQuery(document).ready(function() {

                clstyle.forEach(a, () => {
                    console.log(a);
                })
                jQuery.ajax({
                    url: ajaxurl,
                    type: 'post',
                    data: {
                        action: 'dynamic_view_ajax',
                        post_id: 96153
                    },
                    success: function(response) {}
                });
            });
        </script>
    </div>
    </div>
</x-layout>