<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

Breadcrumbs::for('admin.update', function ($trail) {
    $trail->push(__('strings.backend.update.title'), route('admin.update'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
