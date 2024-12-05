<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Anthropic\Laravel\Facades\Anthropic;

class DashboardController extends Controller
{
    public function index()
    {
        $IATalk = "A OpenAi tem alguma opção de créditos para testar a suas APIs?";

        $result = Anthropic::messages()->create([
            'model' => 'claude-3-haiku-20240307',
            'max_tokens' => 1024,
            'messages' => [
              ['role' => 'user', 'content' => $IATalk]
            ],
          ]);

        echo nl2br($result->content[0]->text);
    }
}
