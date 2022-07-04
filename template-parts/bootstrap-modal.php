<!-- Modal -->
<div class="modal fade" id="jecomModal" tabindex="-1" role="dialog" aria-labelledby="jecomModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="jecomModalCenterTitle"><?php echo get_option('modal_window_title');?></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <?php echo get_option('modal_window_content');?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var jecomModal = new bootstrap.Modal(document.getElementById('jecomModal'), {})
  setTimeout(function() {
    jecomModal.show()
  }, 5000);
</script>