<?php $this->load->view('includes/header'); ?>
<style>
    p {
        text-align: justify;
    }
</style>

<section class="inner-section blog-grid pt-5 mt-md-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-7">
                <h2 class="blog-hdg"><?= $all_blogs['title'] ?></h2>
                <ul class="blog-meta">
                    <li><i class="fas fa-calendar-alt"></i><span><?= dateConvertToView($all_blogs['create_date'], 1) ?></span></li>
                </ul>
                <div class="blog-card">
                    <div class="blog-media">
                        <a class="blog-img" href="#"><img src="<?= base_url() ?>upload/blog/<?= $all_blogs['picture'] ?>" alt="blog" class="w-100"></a>
                    </div>
                    <ul class="blog-meta">
                        <img src="<?= base_url() ?>assets/images/blog/share.png" alt="Kritosh">
                        <h2 class="share-blogs">Share</h2>
                        <a class="share-btns" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url('blog?blog_sno=' . $all_blogs['blog_id']) ?>">
                            <i class="fa fa-facebook-f"></i>
                        </a>
                        <a class="share-btns" target="_blank" href="https://www.linkedin.com/shareArticle?url=<?= base_url('blog?blog_sno=' . $all_blogs['blog_id']) ?>&title=<?= $title ?>&summary=Kritosh-blogging&source=kritosh.in">
                            <i class="fa fa-linkedin-in"></i>
                        </a>
                        <button class="share-btns" onclick="Copy();">
                            <i class="fas fa-copy"></i>
                        </button>
                    </ul>
                    <!-- Basic Share Links -->

                    <!-- Facebook (url) -->
                    <div class="blog-content mb-5">
                        <?= $all_blogs['content'] ?>
                    </div>
                    <div class="d-flex justify-content-center mb-5">
                        <a class="blog-btn  mb-5" href="<?= base_url() ?>"><i class="icofont-arrow-left"></i><span>Back to home</span></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <!-- <div class="blog-widget">
                    <form class="blog-widget-form"><input type="text" placeholder="Search blogs"><button class="icofont-search-1"></button></form>
                </div> -->
                <div class="blog-widget">
                    <h3 class="blog-widget-title">Recent Posts</h3>
                    <ul class="blog-widget-feed">
                        <?php
                        if ($all_blog_list) {
                            $i = 0;
                            foreach ($all_blog_list as $item) {
                                $i = $i + 1;
                                $id = encryptId($item['blog_id']);
                        ?>
                                <li><a class="blog-widget-media" href="#"><img src="<?= base_url() ?>upload/blog/<?= $item['picture'] ?>" alt="blog-widget"></a>
                                    <h6 class="blog-widget-text"><a href="<?= base_url($item['slug_title']) . '-details' ?>"><?= $item['title'] ?></a><span><?= dateConvertToView($item['create_date'], 1) ?></span></h6>
                                </li>
                        <?php
                            }
                        }
                        ?>
                        <!-- <li><a class="blog-widget-media" href="#"><img src="<?= base_url() ?>assets/images/blog/2.webp" alt="blog-widget"></a>
                            <h6 class="blog-widget-text"><a href="#">Tips and Hacks to make your perfume Last Longer</a><span>03 Jun 2024</span></h6>
                        </li>
                        <li><a class="blog-widget-media" href="#"><img src="<?= base_url() ?>assets/images/blog/3.webp" alt="blog-widget"></a>
                            <h6 class="blog-widget-text"><a href="#">Tips and Hacks to make your perfume Last Longer</a><span>03 Jun 2024</span></h6>
                        </li>
                        <li><a class="blog-widget-media" href="#"><img src="<?= base_url() ?>assets/images/blog/4.webp" alt="blog-widget"></a>
                            <h6 class="blog-widget-text"><a href="#">Tips and Hacks to make your perfume Last Longer</a><span>03 Jun 2024</span></h6>
                        </li>
                        <li><a class="blog-widget-media" href="#"><img src="<?= base_url() ?>assets/images/blog/5.webp" alt="blog-widget"></a>
                            <h6 class="blog-widget-text"><a href="#">Tips and Hacks to make your perfume Last Longer</a><span>03 Jun 2024</span></h6>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<input type="hidden" id="url" />

<?php $this->load->view('includes/footer'); ?>

<?php $this->load->view('includes/footer-link'); ?>
<script>
    function Copy() {
        var Url = document.getElementById("url");
        Url.value = "<?= (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>";
        // console.log(Url.value)
        Url.select();
        document.execCommand("copy");
        alert('URL copied');
    }
</script>
</body>

</html>