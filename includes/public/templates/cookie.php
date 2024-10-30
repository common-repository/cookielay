<div class="cl-cookie">
    <?php if(!$essential): ?>
    <label class="cl-switch">
        <input type="checkbox" data-cookielay-cookie="<?php echo $cookie->id; ?>">
        <span class="cl-switch__slider" data-active="<?php echo $text["general-active"]; ?>" data-inactive="<?php echo $text["general-inactive"]; ?>"></span>
    </label>
    <?php endif; ?>
    <table cellspacing="0">
        <tr>
            <td><?php echo $text["cookie-title"]; ?>:</td>
            <td><?php echo $cookie->title; ?></td>
        </tr>
        <tr>
            <td><?php echo $text["cookie-name"]; ?>:</td>
            <td><?php echo $cookie->name; ?></td>
        </tr>
        <tr>
            <td><?php echo $text["cookie-provider"]; ?>:</td>
            <td><?php echo $cookie->provider; ?></td>
        </tr>
        <tr>
            <td><?php echo $text["cookie-function"]; ?>:</td>
            <td><?php echo $cookie->description; ?></td>
        </tr>
        <tr>
            <td><?php echo $text["cookie-time"]; ?>:</td>
            <td><?php echo $cookie->lifetime; ?></td>
        </tr>
        <?php if($cookie->privacy): ?>
        <tr>
            <td><?php echo $text["cookie-privacy"]; ?>:</td>
            <td><a href="<?php echo $cookie->privacy; ?>" target="_blank"><?php echo str_replace(array("https://", "http://"), "", $cookie->privacy); ?></a></td>
        </tr>
        <?php endif; ?>
        <?php if($cookie->imprint): ?>
        <tr>
            <td><?php echo $text["cookie-imprint"]; ?>:</td>
            <td><a href="<?php echo $cookie->imprint; ?>" target="_blank"><?php echo str_replace(array("https://", "http://"), "", $cookie->imprint); ?></a></td>
        </tr>
        <?php endif; ?>
    </table>
</div>