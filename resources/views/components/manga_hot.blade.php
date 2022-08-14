
<div class="bixbox hothome">
    <div class="releases">
        <h2>Popular Today</h2>
    </div>
    <div class="listupd">
        <?php foreach($hot as $m ) : ?>
        <div class="bs">
            <div class="bsx">
                <a href="/comics/{{ $m->manga_slugs }} " title="{{ $m->manga_name }}">
                    <div class="limit">
                        <div class="ply"></div>
                        <span class="type Manhua">Manhua</span> <img src="{{ $m->manga_cover }} " class="ts-post-image wp-post-image attachment-medium size-medium" loading="lazy" alt="แปลจนเมื่อย manhwa comic">
                    </div>
                    <div class="">
                        <div class="tt">
                            {{$m->manga_name}}
                        </div>
                        <div class="adds">
                            <div class="rt">
                                <div class="rating">
                                    <div class="rating-prc">
                                        <div class="rtp">
                                            <div class="rtb"><span style="width:{{ $m->manga_rating }}%"></span></div>
                                        </div>
                                    </div>
                                    <div class="numscore">{{$m->manga_rating / 10}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>