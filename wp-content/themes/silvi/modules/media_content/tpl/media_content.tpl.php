<?php
if (!empty($data['module_id'])) {
    $block_id = $data['module_id'];
} else {
    $block_id = 'block-' . uniqid();
}

$addClass = '';
if (!empty($data['background_video'])) {
    $addClass = 'has-video';
}

?>
<section class="media-content" id="<?php echo esc_attr($block_id); ?>" data-animate>
    <?php if (!empty($data['image'])): ?>
        <figure class="media-content__bg-image <?php echo $addClass; ?>">
            <img src="<?php echo esc_url($data['image']['url']); ?>" alt="<?php echo esc_attr($data['image']['alt']); ?>">
        </figure>
    <?php endif; ?>

    <?php if (!empty($data['background_video'])): ?>
        <div class="media-content__video-container">
            <video aria-hidden="true" class="media-content__video video" playsinline autoplay muted loop
                poster="<?php echo esc_url($data['image']['url']); ?>">
                <source src="<?php echo esc_url($data['background_video']['url']); ?>" type="video/mp4">
            </video>
        </div>
    <?php endif; ?>
    <?php if (!empty($data['title']) || !empty($data['buttons']) || !empty($data['content'])): ?>
    <div class="container">
        <div class="media-content__wrap">
            <?php if (!empty($data['title'])): ?>
                <h2 class="media-content__title"><?php echo $data['title']; ?></h2>
            <?php endif; ?>
            <?php if (!empty($data['content'])): ?>
                <div class="media-content__description entry-content"><?php echo $data['content']; ?></div>
            <?php endif; ?>
            <?php if (!empty($data['buttons'])): ?>
                <div class="media-content__secondary">
                    <?php foreach ($data['buttons'] as $item):
                        ?>
                        <a class="btn" href="<?php echo $item['link']['url']; ?>"
                            target="<?php echo $item['link']['target']; ?>">
                            <?php echo $item['link']['title']; ?> <svg class="icon icon-silviRightArrow">
                                <use xlink:href="#icon-silviRightArrow"></use>
                            </svg>
                        </a>
                        <?php
                    endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
</section>
<!-- .hero ends -->