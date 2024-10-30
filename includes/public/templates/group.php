<div class="cl-accordion">
    <div class="cl-accordion__inner">
        <div class="cl-accordion__header">
            <div class="cl-group-name">
                <div class="cl-name"><?php echo $group->name; ?> (<?php echo count($cookies); ?>)</div>
                <?php if(!$essential): ?>
                <label class="cl-switch">
                    <input type="checkbox" data-cookielay-group="<?php echo $group->id; ?>">
                    <span class="cl-switch__slider" data-active="<?php echo $text["general-active"]; ?>" data-inactive="<?php echo $text["general-inactive"]; ?>"></span>
                </label>
                <?php endif; ?>
            </div>
            <div class="cl-group-desc"><?php echo $group->description; ?></div>
            <div class="cl-more" data-cookielay-more><?php echo $text["individual-button-showcookies"]; ?></div>
        </div>
        <div class="cl-accordion__content">
            <div class="cl-cookies">
                <?php $this->show_cookies($cookies, $essential); ?>
            </div>
        </div>
    </div>
</div>