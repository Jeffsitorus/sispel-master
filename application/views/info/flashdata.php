<!-- session flashdata -->
<div class="col-lg-6">
  <?php if (!empty($this->session->flashdata('success')  || $this->session->flashdata('error'))) : ?>
    <div class="alert alert-<?php if ($this->session->flashdata('success')) {
                              echo "success";
                            } else if ($this->session->flashdata('error')) {
                              echo "danger";
                            } ?> alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
      </button>
      <i class="fas fa-<?php if ($this->session->flashdata('success')) {
                          echo "check";
                        } else if ($this->session->flashdata('error')) {
                          echo "exclamation-triangle";
                        } ?>"></i>
      <?= $this->session->flashdata('success'); ?>
      <?= $this->session->flashdata('error'); ?>
    </div>
  <?php endif; ?>
</div>
<!-- end session -->