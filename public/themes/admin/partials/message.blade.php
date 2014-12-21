@if (isset($data['type']) && isset($data['text']))

    <?php
        switch ($data['type']) {
            case 'success':
        ?>
        <div class="alert alert-success alert-block fade in">
                                          <button data-dismiss="alert" class="close close-sm" type="button">
                                              <i class="fa fa-times"></i>
                                          </button>
                                          <h4>
                                              <i class="fa fa-ok-sign"></i>
                                              Success!
                                          </h4>
                                          <p>{{ $data['text'] }}</p>
        </div>
        <?php
            break;

            case 'error':
        ?>
        <div class="alert alert-danger alert-block fade in">
                                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                                      <i class="fa fa-times"></i>
                                                  </button>
                                                  <h4>
                                                      <i class="fa fa-ok-sign"></i>
                                                      Oh snap!
                                                  </h4>
                                                  <p>{{ $data['text'] }}</p>
        </div>
        <?php
            break;
        }
    ?>

@endif