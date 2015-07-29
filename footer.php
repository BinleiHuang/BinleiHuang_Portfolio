</div>
<!-- Container End -->
<hr/>
<div class="row">
<footer class="main-footer" role="contentinfo">

    <div class="row">
        <div class="small-12 medium-12 columns">
            <p>&copy;
                <?php echo date( 'Y'); ?>
                <?php bloginfo( 'name'); ?>.
                 </p>
        </div>


    </div>

    <div class="row">

    <p>    jidekaixin7@gmail.commmmmmmmmmm </p>
    </div>
</footer>
</div>
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
