<?php
/**
 * Cookielay Template (Bottom)
 * 
 * The Cookielay bottom template.
 * 
 * @package cookielay
 * @subpackage cookielay/template
 */
?>

<div id="cookielay" class="cl-layout-bottom">
    <div class="cookielay__box">
        <div class="cookielay__content">
            <div class="cl-title"><?php echo $text["general-headline"]; ?></div>
            <div class="cl-content">
                <div class="cl-desc"><?php echo $text["general-description"]; ?></div>
                <div class="cl-options">
                    <?php if(!$settings["hide-checkboxes"]): ?>
                        <div class="cl-checkboxes">
                            <?php $this->show_checkboxes(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="cl-buttons">
                        <div class="cl-button cl-button--primary" data-cookielay-allow="all"><?php echo $text["general-button-all"]; ?></div>
                        <?php if(!$settings["hide-checkboxes"]): ?>
                            <div class="cl-button cl-button--primary" data-cookielay-allow="custom"><?php echo $text["general-button-selected"]; ?></div>
                        <?php else: ?>
                            <div class="cl-button cl-button--primary" data-cookielay-allow="essential"><?php echo $text["general-button-reject"]; ?></div>
                        <?php endif; ?>
                        <div class="cl-button cl-button--secondary" data-cookielay-settings><?php echo $text["general-button-individual"]; ?></div>
                    </div>
                </div>
            </div>
            <div class="cl-footer">
                <div class="cl-links">
                    <?php if($settings["privacy-page"]): ?><a href="<?php echo get_permalink($settings["privacy-page"]); ?>"><?php echo $text["general-privacy"]; ?></a><?php endif; ?>
                    <?php if($settings["imprint-page"]): ?><a href="<?php echo get_permalink($settings["imprint-page"]); ?>"><?php echo $text["general-imprint"]; ?></a><?php endif; ?>
                </div>
                <?php if($settings["hide-branding"] != "on"): ?><div class="cl-branding"><a href="<?php echo COOKIELAY_WEBSITE; ?>" target="_blank"><?php echo $icon; ?>Powered by Cookielay</a></div><?php endif; ?>
            </div>
        </div>
        <div class="cookielay__settings">
            <div class="cl-inner">
                <div class="cl-text">
                    <div class="cl-title"><?php echo $text["individual-headline"]; ?></div>
                    <?php if($text["individual-description"]): ?><div class="cl-desc"><?php echo $text["individual-description"]; ?></div><?php endif; ?>
                </div>
                <div class="cl-buttons">
                    <div class="cl-button cl-button--secondary" data-cookielay-allow="custom"><?php echo $text["individual-button-safe"]; ?></div>
                    <div class="cl-button cl-button--text" data-cookielay-settings><?php echo $text["individual-button-cancel"]; ?></div>
                </div>
                <div class="cl-accordions">
                    <?php $this->show_groups(); ?>
                </div>
            </div>
        </div>
    </div>
</div>