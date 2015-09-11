</div>
<!-- Container End -->
<hr/>

<footer class="main-footer" role="contentinfo">



            <p>&copy;
                <?php echo date( 'Y'); ?>
                <?php bloginfo( 'name'); ?>.
                 </p>




    <p>    binleihuang7@gmail.com  </p>

</footer>

<?php wp_footer(); ?>


<script>

$(window).load(function(){

  $('#container').masonry({

    itemSelector: '#container li'

  });

});
    </script>

<script>
    (function ($) {
        $(document).foundation();
    })(jQuery);
</script>

</body>

</html>
