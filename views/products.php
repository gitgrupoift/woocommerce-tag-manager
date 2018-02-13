<script>
// Measures product impressions and also tracks a standard
// pageview for the tag configuration.
// Product impressions are sent by pushing an impressions object
// containing one or more impressionFieldObjects.
dataLayer.push({
    'ecomm_prodid': '',
    'ecomm_pageType': '<?= ( is_front_page() ? "home" : "category" ) ?>',
    'ecomm_totalValue': '0'
});
</script>