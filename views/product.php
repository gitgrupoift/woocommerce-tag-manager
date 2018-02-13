<script>
// Measure a view of product details. This example assumes the detail view occurs on pageload,
// and also tracks a standard pageview of the details page.
dataLayer.push({
  'ecomm_prodid': '<?= $product_id ?>',
  'ecomm_pageType': 'product',
  'ecomm_totalValue': '<?= $product->get_price() ?>',
  'ecommerce': {
    'detail': {
      'actionField': {'list': '<?= $product_cat ?>'}, // 'detail' actions have an optional list property.
      'products': [{
        'id': '<?= $product_id ?>',
        'name': '<?= get_the_title() ?>',
        'category': '<?= $product_cat ?>',
        'price': '<?= $product->get_price() ?>'
      }]
    }
  }
});
</script>