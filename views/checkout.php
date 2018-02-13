<script>
// A function to handle a click on a checkout button. This function uses the eventCallback
// data layer variable to handle navigation after the ecommerce data has been sent to Google Analytics.
dataLayer.push({
  'ecomm_prodid': '<?= $products_remarketing ?>',
  'ecomm_pageType': 'cart',
  'ecomm_totalValue': '<?= $totalvalue ?>'
  'event': 'checkout',
  'ecommerce': {
    'checkout': {
      'actionField': {'step': 1},
      'products': [
        <?php foreach ( $woocommerce->cart->get_cart() as $item => $values ) : ?>
          <?php $_product = wc_get_product( $values['data']->get_id()); ?>
            {
              'id': <?= $_product->get_id() ?>,
              'name': '<?= $_product->get_title() ?>',
              'price': <?= get_post_meta($values['product_id'] , '_price', true) ?>,
              'quantity': <?= $values['quantity'] ?>
            },
        <?php endforeach ?>
      ]
    }
  }
});
</script>