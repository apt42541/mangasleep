<x-layout>
    <div id="content " style="margin-top:15px;transform: none;">
        <div class="wrapper" style="transform: none;">
            <x-manga_hot :hot="$data2"></x-manga_hot>
            <div class="postbody">

                <div class="bixbox">
                    <div class="releases">
                        <h2>Search Result</h2>
                    </div>
                    <div class="listupd">
                            <div class="utao styletwo">
                                <div class="uta">
                                    <div class="imgu">
                                        <a rel="99062" class="series" href="<?= '/comics/' . $search->manga_slugs . '/'; ?>" title="<?= $search->manga_name; ?>">
                                            <img src="<?= $search->manga_cover; ?>" class="ts-post-image wp-post-image attachment-post-thumbnail size-post-thumbnail" loading="lazy" alt="แปลจนเมื่อย manhwa comic"> </a>
                                    </div>
                                    <div class="luf">
                                        <a class="series" href="<?= '/comics/' . $search->manga_slugs . '/'; ?>" title="<?= $search->manga_name; ?>">
                                            <h4><?= $search->manga_name ?></h4>
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
            <x-sidebar></x-sidebar>
        </div>
    </div>
    <!-- <x-home.hot :data="$data2"></x-home.hot> -->

</x-layout>