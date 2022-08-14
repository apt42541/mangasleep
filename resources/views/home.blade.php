<x-layout>
    <div id="content " style="margin-top:15px;transform: none;">
        <div class="wrapper" style="transform: none;">
            <x-manga_hot :hot="$data2"></x-manga_hot>
            <div class="postbody">

                <div class="bixbox">
                    <div class="releases">
                        <h2>Latest Update</h2>
                    </div>
                    <div class="listupd">
                        <?php foreach ($data as $manga) : ?>
                            <div class="utao styletwo">
                                <div class="uta">
                                    <div class="imgu">
                                        <a rel="99062" class="series" href="<?= '/comics/' . $manga->manga_slugs . '/'; ?>" title="<?= $manga->manga_name; ?>">
                                            <img src="<?= $manga->manga_cover; ?>" class="ts-post-image wp-post-image attachment-post-thumbnail size-post-thumbnail" loading="lazy" alt="แปลจนเมื่อย manhwa comic"> </a>
                                    </div>
                                    <div class="luf">
                                        <a class="series" href="<?= '/comics/' . $manga->manga_slugs . '/'; ?>" title="<?= $manga->manga_name; ?>">
                                            <h4><?= $manga->manga_name ?></h4>
                                        </a>
                                        <ul class="Manhwa">
                                            <?php foreach ($manga->chapters as $m) : ?>
                                                <li><a href="<?= '/comics/' . $manga->manga_slugs . '/' . $m->chapter_slugs; ?>">


                                                        @if($m->isFree == "1")
                                                        <i class="fa-solid fa-lock"></i>
                                                        @elseif($m->isFree == "3")
                                                        <i class="fa-solid fa-key"></i>
                                                        @endif
                                                        Ch <?= $m->chapter_slugs; ?></a><span><?= $m->created_at->diffForHumans(); ?></span></li>

                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <x-sidebar></x-sidebar>
        </div>
    </div>
    <!-- <x-home.hot :data="$data2"></x-home.hot> -->

</x-layout>