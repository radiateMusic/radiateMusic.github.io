<div class="featuredLodge m-top-25">
    <img src="<?=  $img ?>">
    <h2 class="text-uppercase bolden m-top-25"><?php echo $title ?></h2>
    <div><?=  reset($meta["Lodge_information"]) ?></div>
    <div class="m-top-15 text-blue-dark enbolden text-uppercase">
        <div><?= reset($meta["phone"]) ?> </div>
        <div><a class="text-blue-dark" href="<?= reset($meta["website"]) ?>" target="_blank"><?= reset($meta["website"]) ?></a></div>
        <div class="m-top-5"><a href="<?= reset($meta["contact_email"]) ?>" class="i-link i-link-dark"><?= ffbh_Icon('ffbhsiteicons-26') ?><span class="fix-middle"><?= reset($meta["contact_name"]) ?></span></a></div>
    </div>
</div>
