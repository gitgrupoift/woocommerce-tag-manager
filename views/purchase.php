<script>
// Send transaction data with a pageview if available
// when the page loads. Otherwise, use an event when the transaction
// data becomes available.
dataLayer.push({
  'ecommerce': {
    'purchase': {
      'actionField': {
        'id': '<?= $order_id ?>',
        'revenue': '<?= $order->get_total() ?>'
      },
      'products': [
        <?php
        // This is how to grab line items from the order 
        $line_items = $order->get_items();
        // This loops over line items
        foreach ( $line_items as $item ) : ?>
          <?php $product = $order->get_product_from_item( $item ); ?>
          {
            'id': <?= $product->get_sku() ?>,
            'name': '<?= $product->get_name() ?>',
            'price': <?= $order->get_line_total( $item, true, true ) ?>,
            'quantity': <?= $item['qty'] ?>
          },
        <?php endforeach ?>
      ]
    }
  }
});
</script>