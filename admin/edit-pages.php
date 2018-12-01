<?php include_once './inc/header.php';
include_once 'messages/alertClass.php';
$message=new alertClass();
define('pageclassconst', TRUE);
include 'pages/pageClass.php';
$pageClass=new pagesClass();
if(isset($_POST["submit"])){
    include_once 'functions/gump.class.php';
    $gump = new GUMP();
    $gump->validation_rules(array(
    'Title'    => 'required',
        'URL'    => 'required',
        'PageDetails'    => 'required'
));
    $gump->filter_rules(array(
    'Title'    => 'trim|sanitize_string',
        'URL'    => 'trim|sanitize_string',
        'Keywords'    => 'trim|sanitize_string',
        'Description'    => 'trim|sanitize_string'
));
    $validated_data = $gump->run($_POST);
    if($validated_data === false) {
    $alert=$message->getAlert($gump->get_readable_errors(true),"error");
} else {
        unset($validated_data['submit']);
        $alert=$pageClass->updatePage($validated_data,$_GET["eid"]);
}
}
$id=$_GET["eid"];
$pageDetails=$pageClass->particularPage($id);
?>
    <div class="container">
      <div class="row">
        <div class="container">
          <h1 class="page-header">Update Pages</h1>
          <?php echo $alert; ?>
          <form method="post" action="<?php echo $_SERVER["PHP_SELF"]."?eid=$id" ?>" enctype="multipart/form-data">
              <div class="form-group">
                  <label>Page Name*</label>
                  <input type="text" id="PageName" name="PageName" value="<?php echo $pageDetails["PageName"] ?>" class="form-control">
              </div>
              <div class="form-group">
                  <label>Title*</label>
                  <input type="text" id="Title" name="Title" value="<?php echo $pageDetails["Title"] ?>" class="form-control">
              </div>
              <div class="form-group">
                  <label>URL*</label>
                  <input type="text" id="URL" name="URL" value="<?php echo $pageDetails["URL"] ?>" class="form-control">
              </div>
              <div class="form-group">
                  <label>Meta Keywords</label>
                  <input type="text" id="Keywords" name="Keywords" value="<?php echo $pageDetails["Keywords"] ?>" class="form-control">
              </div>
              <div class="form-group">
                  <label>Meta Description</label>
                  <textarea id="Description" name="Description"  class="form-control"><?php echo $pageDetails["Description"] ?></textarea>
              </div>
              <div class="form-group">
                  <label>Page Details*</label>
                  <!--<textarea id="summernote" name="PageDetails"><?php echo $pageDetails["PageDetails"] ?></textarea>-->
                  <textarea name="PageDetails" class="tinymce"><?php echo $pageDetails["PageDetails"] ?></textarea>
              </div>
              <input type="submit" id="submit" name="submit" value="Update Page" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://demo.ashrafalis.tech/cms2/admin/assets/js/popper.min.js"></script>
    <script src="https://demo.ashrafalis.tech/cms2/admin/assets/js/modernizr.min.js"></script>
        <script src="https://demo.ashrafalis.tech/cms2/admin/assets/js/detect.js"></script>
        <script src="https://demo.ashrafalis.tech/cms2/admin/assets/js/fastclick.js"></script>
        <script src="https://demo.ashrafalis.tech/cms2/admin/assets/js/jquery.slimscroll.js"></script>
        <script src="https://demo.ashrafalis.tech/cms2/admin/assets/js/jquery.blockUI.js"></script>
        <script src="https://demo.ashrafalis.tech/cms2/admin/assets/js/waves.js"></script>
        <script src="https://demo.ashrafalis.tech/cms2/admin/assets/js/jquery.nicescroll.js"></script>
        <script src="https://demo.ashrafalis.tech/cms2/admin/assets/js/jquery.scrollTo.min.js"></script>
        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <!-- App js -->
        <?php
        define("URL", "https://demo.ashrafalis.tech/cms2/admin");
        ?>
        <script src="<?php echo URL; ?>/assets/js/app.js"></script>

        <!-- Required datatable js -->
        <script src="<?php echo URL; ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo URL; ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo URL; ?>/assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo URL; ?>/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo URL; ?>/assets/plugins/datatables/jszip.min.js"></script>
        <script src="<?php echo URL; ?>/assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php echo URL; ?>/assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?php echo URL; ?>/assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo URL; ?>/assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="<?php echo URL; ?>/assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="<?php echo URL; ?>/assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo URL; ?>/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="<?php echo URL; ?>/assets/pages/datatables.init.js"></script>

        <!-- Plugins Init js -->
        <script src="<?php echo URL; ?>/assets/pages/form-advanced.js"></script>
        <script src="<?php echo URL; ?>/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
        <script src="<?php echo URL; ?>/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js" type="text/javascript"></script>
         <script src="<?php echo URL; ?>/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
         <script src="<?php echo URL; ?>/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
         <script src="<?php echo URL; ?>/assets/pages/form-advanced.js" type="text/javascript"></script>
         <script src="<?php echo URL; ?>/assets/plugins/tinymce/tinymce.min.js" type="text/javascript"></script>
          <script src="<?php echo URL; ?>/assets/plugins/tinymce/init-tinymce.js" type="text/javascript"></script>
         <script src="<?php echo URL; ?>/assets/js/style.js" type="text/javascript"></script>
         <script src="<?php echo URL; ?>/assets/js/slugger.js" type="text/javascript"></script>
         <script>
          $('#permalink').slugger({
              source: '#page_title',
              readonly: true
          });
          </script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/summernote/summernote.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#summernote').summernote({
  height: 300,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  focus: true                  // set focus to editable area after initializing summernote
});
    });
  </script>
  </body>
</html>
