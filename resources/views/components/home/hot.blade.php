@props([
'data'
])
<div class="bixbox hothome ">
    <div class="releases">
        <h2>Popular Today</h2>
    </div>
    <div class="listupd">
        <?php foreach ($data as $m) : ?>
            <div class="bs">
                <div class="bsx">
                    <a href="/comics/<?=$m->magan_slugs?>" title="Reincarnation of the Suicidal Battle God">
                        <div class="limit">
                            <div class="ply"></div>
                            <span class="type Manhua">Manhua</span> <img src="<?=$m->manga_cover?>" class="ts-post-image wp-post-image attachment-medium size-medium" loading="lazy" alt="แปลจนเมื่อย manhwa comic">
                        </div>
                        <div class="">
                            <div class="tt">
                            <?=$m->manga_name;?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>