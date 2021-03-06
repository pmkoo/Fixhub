<?php

/*
 * This file is part of Fixhub.
 *
 * Copyright (C) 2016 Fixhub.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fixhub\Http\Controllers\Dashboard;

use Fixhub\Models\Project;
use Fixhub\Http\Controllers\Controller;

/**
 * The deployment webhook management controller.
 */
class WebhookController extends Controller
{
    /**
     * Generates a new webhook URL.
     *
     * @param  Project $project
     *
     * @return Response
     */
    public function refresh(Project $project)
    {
        $project->generateHash();
        $project->save();

        return [
            'url' => route('webhook.deploy', $project->hash),
        ];
    }
}
