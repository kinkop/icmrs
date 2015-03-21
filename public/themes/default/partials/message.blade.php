@if (isset($data['type']) && isset($data['text']))

    <?php
        switch ($data['type']) {
            case 'success':
        ?>
        <div class="alert alert-success">
            <strong>Success!</strong><br /> {{ $data['text'] }}
        </div>

        <?php
            break;

            case 'error':
        ?>
        <div class="alert alert-danger">
            <strong>Error!</strong><br /> {{ $data['text'] }}
        </div>

        <?php
            break;
        }
    ?>

@endif