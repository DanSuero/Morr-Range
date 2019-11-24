<?php $value = get_post_meta( $post->ID, '_gun_detials', false ); ?>
<?php $ftr_value = get_post_meta( $post->ID, '_gun_featured', true ); ?>
<div style="padding:5px;">
    <label for="gun-price" style="display:block;">Price</label>
    <input type="text" id="gun-price" name="gun-price" style="width:150px;" value="<?php echo $value[0][0]; ?>" />

    <label for="gun-buy-local" style="display:block; margin-top: 10px; margin-bottom: 5px;">Can it be bought localy?</label>
    Yes <input type="checkbox" id="gun-buy-local" name="gun-buy-local" style="margin-right: 5px;"  <?php echo ($value[0][1] == 'on')? 'checked="checked"':''; ?>/>

    <label for="gun-ebay-link" style="display:block; margin-top: 10px;">eBay link</label>
    <input type="text" id="gun-ebay-link" name="gun-ebay-link" style="width:100%;" value="<?php echo $value[0][2]; ?>" />

    <label for="gun-gunBroker-link" style="display:block; margin-top: 10px;">Gun Broker Link</label>
    <input type="text" id="gun-gunBroker-link" name="gun-gunBroker-link" style="width:100%;" value="<?php echo $value[0][3]; ?>" />
    
    <label for="gun-buy-local" style="display:block; margin-top: 10px; margin-bottom: 5px;">Feature this gun on the front page?</label>
    Yes <input type="checkbox" id="feature-gun" name="feature-gun" style="margin-right: 5px;"  <?php echo ($ftr_value == 'on')? 'checked="checked"': ''; ?>/>
</div>