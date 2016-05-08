</div>
<!-- /.container -->

<br/>

<!-- jQuery -->
<script src="public/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="public/js/bootstrap.min.js"></script>
<!--Mustache-->
<script src="public/js/mustache.min.js"></script>

<!--load the row template-->
<script id="note_row_template" type="text/mustache">
  <?= file_get_contents(dirname(__FILE__) . '/../partials/note_row.mustache'); ?>
</script>

<!--My scripts-->
<script src="public/js/scripts.js"></script>
</body>

</html>